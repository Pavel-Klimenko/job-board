<?php

namespace App\Http\Controllers;

use App\Models\InterviewInvitations;
use function Doctrine\Common\Cache\Psr6\get;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Roles;
use App\Models\User;
use App\Models\Vacancies;
use App\Models\Reviews;
use App\Constants;
use App\Services\Helper;
use App\Services\Charts;
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


    //TODO сделать пагинацию и фильтрацию в списках
    //TODO объединить методы CRUD (render, update и т.д.) можно через интерфейс
    //TODO разобраться с '/////////' в JSON полях
    //TODO сделать события при обновлении сущности


    public function __construct(CacheContract $cacheService) {
        $this->candidatesRole = Constants::USER_ROLE_NAMES['candidate'];
        $this->companiesRole = Constants::USER_ROLE_NAMES['company'];
        $this->roles = Roles::all();
        $this->jobCategories = JobCategories::all();
        $this->cacheService = $cacheService;
    }


    public function renderAdminPanel() {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        return view('admin_area.main',
            compact( 'candidatesRole', 'companiesRole'));
    }


    public function renderUserList($userType) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $users = new User();
        $roleName = Constants::USER_ROLE_NAMES[$userType];
        $roleId = Helper::getRoleIdByName($roleName);
        $users = $users->where('role_id', $roleId)->get();

        return view('admin_area.users_list',
            compact( 'candidatesRole', 'companiesRole', 'users', 'userType'));
    }

    public function renderUser($id) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $user = User::find($id);

        if ($user->role_id == Constants::USER_ROLES_IDS[$candidatesRole]) {
            $jobCategories = $this->jobCategories;
            $category = Helper::getTableRow(JobCategories::class, 'ID', $user->CATEGORY_ID);
            return view('admin_area.candidate',
                compact('user', 'category', 'candidatesRole', 'companiesRole', 'jobCategories'));
        }

        if ($user->role_id == Constants::USER_ROLES_IDS[$companiesRole]) {
            return view('admin_area.company',
                compact('user','candidatesRole', 'companiesRole'));
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
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $vacancies = Vacancies::all();
        return view('admin_area.vacancies',
            compact( 'candidatesRole', 'companiesRole', 'vacancies'));
    }

    public function renderVacancy($id) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $vacancy = Vacancies::find($id);
        $category = Helper::getTableRow(JobCategories::class, 'ID', $vacancy->CATEGORY_ID);
        $company = Helper::getTableRow(User::class, 'ID', $vacancy->COMPANY_ID);
        $jobCategories = $this->jobCategories;

        return view('admin_area.vacancy',
            compact('vacancy', 'jobCategories', 'category', 'company', 'candidatesRole', 'companiesRole'));

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
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;

        $reviews = Reviews::all();
        return view('admin_area.reviews',
            compact('reviews', 'candidatesRole', 'companiesRole'));
    }

    public function renderReview($id) {
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;
        $review = Reviews::find($id);

        return view('admin_area.review',
            compact('review', 'candidatesRole', 'companiesRole'));
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


    /**Line chart of growth since start of the current year
     *
     * @param $entity
     */
    public function renderLineChartAnalytics($entity) {
       $currentMonth = Helper::getCurrentMonth();

       $quantityOfMonths = $currentMonth;
       $monthsRange = range(0,$quantityOfMonths - 1);
       rsort($monthsRange);

       $arrMonths = [];
       $monthsInYear = 12;
       foreach ($monthsRange as $month) {
           $monthNumber = $currentMonth - $month;
           $monthNumber = ($monthNumber < 1) ? $monthsInYear + $monthNumber : $monthNumber;
           $arrMonths[] = $monthNumber;
       }

       if ($entity == 'vacancies') {
           $model = Vacancies::class;
       } elseif ($entity == 'users') {
           $model = User::class;
       }

        $chartData = [];
        foreach ($arrMonths as $month) {
            $rowData = Helper::getQuantityMonthlyRows($model, $month);
            $chartData['MONTHS'][] = $rowData['MONTHS'];
            $chartData['QUANTITY'][] = $rowData['CNT_ROWS'];
        }

        Charts::renderLineChart('New vacancies', $chartData['QUANTITY'], $chartData['MONTHS']);
    }

    public function renderRatioAnalytics($entity) {
        if ($entity == 'users') {
            $candidatesQuantity = User::candidates()->count();
            $companiesQuantity = User::companies()->count();
            $arrData = [$candidatesQuantity, $companiesQuantity];
            $arrTitles = ["Candidates", "Companies"];
        } elseif ($entity == 'invitations') {
            $acceptedInvitations = InterviewInvitations::accepted()->count();
            $rejectedInvitations = InterviewInvitations::rejected()->count();
            $noStatusInvitations = InterviewInvitations::nostatus()->count();
            $arrData = [$acceptedInvitations, $rejectedInvitations, $noStatusInvitations];
            $arrTitles = ["Accepted", "Rejected", "No status"];
        }
        Charts::renderPieChart($arrData, $arrTitles);
    }


}
