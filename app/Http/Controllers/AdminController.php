<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use function Doctrine\Common\Cache\Psr6\get;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Roles;
use App\Models\User;
use App\Models\Vacancies;
use App\Models\Reviews;
use App\Constants;
use App\Services\Helper;
use Illuminate\Http\Request;
use App\Models\JobCategories;
use App\Contracts\CacheContract;

class AdminController extends BaseController
{
    protected $candidatesRole;
    protected $companiesRole;
    protected $roles;
    protected $jobCategories;
    protected $cacheService;

    //TODO Аналитика для админки:
    // 1) Количество новых пользователей портала (зарегистрированных) за промежуток времени
        //из них компаний и кандидатов (количество)
    // 2) Количество приглашений кандидатов на интервью за промежуток времени
    // 3) Построение графиков на основе аналитики



    //TODO сделать пагинацию и фильтрацию в списках
    //TODO объединить методы CRUD (render, update и т.д.) можно через интерфейс
    //TODO разобраться с '/////////' в JSON полях


    public function __construct(CacheContract $cacheService) {
        $this->candidatesRole = Constants::USER_ROLE_NAMES['candidate'];
        $this->companiesRole = Constants::USER_ROLE_NAMES['company'];
        $this->roles = Roles::all();
        $this->jobCategories = JobCategories::all();
        $this->cacheService = $cacheService;
    }


    public function renderAdminPanel() {
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        return view('admin_area.main',
            compact('roles', 'candidatesRole', 'companiesRole'));
    }


    public function renderUserList($userType) {
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $users = new User();
        $roleName = Constants::USER_ROLE_NAMES[$userType];
        $roleId = Helper::getRoleIdByName($roleName);
        $users = $users->where('role_id', $roleId)->get();

        return view('admin_area.users_list',
            compact('roles', 'candidatesRole', 'companiesRole', 'users', 'userType'));
    }

    public function renderUser($id) {
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $user = User::find($id);

        if ($user->role_id == Constants::USER_ROLES_IDS[$candidatesRole]) {
            $jobCategories = $this->jobCategories;
            $category = Helper::getTableRow(JobCategories::class, 'ID', $user->CATEGORY_ID);
            return view('admin_area.candidate',
                compact('user', 'category', 'roles', 'candidatesRole', 'companiesRole', 'jobCategories'));
        }

        if ($user->role_id == Constants::USER_ROLES_IDS[$companiesRole]) {
            return view('admin_area.company',
                compact('user', 'roles', 'candidatesRole', 'companiesRole'));
        }
    }

    public function updateUserInfo(Request $request)
    {
        $user = User::find($request->id);

        if ($request->role_id == Constants::USER_ROLES_IDS[$this->companiesRole]) {
            $userList = $this->companiesRole;
            $arrUserFields = User::getCompanyFields();
        } elseif ($request->role_id == Constants::USER_ROLES_IDS[$this->candidatesRole]) {
            $userList = $this->candidatesRole;
            $arrUserFields = User::getCandidateFields();
        }

        foreach ($arrUserFields as $field) {
            $user->$field = $request->$field;
        }

        $this->cacheService->deleteKeyFromCache('user_'.$user->id);

        $user->save();
        return redirect()->route('admin-users', ['name' => $userList]);
    }



    public function renderVacanciesList() {
        //TODO left меню вынести в свой компонент blade
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $vacancies = Vacancies::all();
        return view('admin_area.vacancies',
            compact('roles', 'candidatesRole', 'companiesRole', 'vacancies'));
    }

    public function renderVacancy($id) {
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $vacancy = Vacancies::find($id);
        $category = Helper::getTableRow(JobCategories::class, 'ID', $vacancy->CATEGORY_ID);
        $company = Helper::getTableRow(User::class, 'ID', $vacancy->COMPANY_ID);
        $jobCategories = $this->jobCategories;

        return view('admin_area.vacancy',
            compact('vacancy', 'jobCategories', 'category', 'company', 'roles', 'candidatesRole', 'companiesRole'));

    }

    public function updateVacancy(Request $request)
    {
        $vacancy = Vacancies::find($request->id);
        $arrVacancyFields = Vacancies::getVacancyFields();

        foreach ($arrVacancyFields as $field) {
            if (in_array($field, Vacancies::$arrJsonFields)) {
                $vacancy->$field = Helper::convertTextPointsToJson($request->$field);
            } else {
                $vacancy->$field = $request->$field;
            }
        }

        $vacancy->save();
        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->id);
        return redirect()->route('admin-vacancies');
    }



    public function renderReviewsList() {
        //TODO left меню вынести в свой компонент blade
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $reviews = Reviews::all();
        return view('admin_area.reviews',
            compact('reviews','roles', 'candidatesRole', 'companiesRole'));
    }

    public function renderReview($id) {
        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $review = Reviews::find($id);

        return view('admin_area.review',
            compact('review', 'roles', 'candidatesRole', 'companiesRole'));
    }


    public function updateReview(Request $request)
    {
        $review = Reviews::find($request->id);
        $arrReviewFields = Reviews::getReviewFields();

        foreach ($arrReviewFields as $field) {
            $review->$field = $request->$field;
        }

        $review->save();
        return redirect()->route('admin-reviews');
    }



    public function deleteEntity(Request $request)  {
        if (in_array($request->entity, Constants::USER_ENTITIES)) {
            $model = User::class;
            $cachePrefix = 'user_';
        } elseif ($request->entity == 'vacancy') {
            $model = Vacancies::class;
            $cachePrefix = 'vacancy_';
        } elseif ($request->entity == 'review') {
            $model = Reviews::class;
        }

        $entity = $model::find($request->id);
        $entity->delete();

        if (isset($cachePrefix) && $cachePrefix) {
            $this->cacheService->deleteKeyFromCache($cachePrefix.$request->id);
        }

        return back();
    }

    public function changeActiveStatus(Request $request)  {
        if (in_array($request->entity, Constants::USER_ENTITIES)) {
            $model = User::class;
            $cachePrefix = 'user_';
        } elseif ($request->entity == 'vacancy') {
            $model = Vacancies::class;
            $cachePrefix = 'vacancy_';
        } elseif ($request->entity == 'review') {
            $model = Reviews::class;
        }

        $entity = $model::find($request->id);
        $entity->ACTIVE = ($entity->ACTIVE == 1) ? 0 : 1;
        $entity->save();

        if (isset($cachePrefix) && $cachePrefix) {
            $this->cacheService->deleteKeyFromCache($cachePrefix.$request->id);
        }

        return back();
    }
}
