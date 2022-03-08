<?php

namespace App\Http\Controllers;
use function Doctrine\Common\Cache\Psr6\get;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Roles;
use App\Models\User;
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


        return view('admin_area.candidates.list',
            compact('roles', 'candidatesRole', 'companiesRole', 'users'));

    }


    public function renderUser($id) {

        $roles = $this->roles;
        $candidatesRole = $this->candidatesRole;
        $companiesRole = $this->companiesRole;
        $jobCategories = $this->jobCategories;

        $user = User::find($id);
        $category = Helper::getTableRow(JobCategories::class, 'ID', $user->CATEGORY_ID);

        return view('admin_area.candidates.profile',
            compact('user', 'category', 'roles', 'candidatesRole', 'companiesRole', 'jobCategories'));
    }


    public function updateUserInfo(Request $request)
    {
        $companyRoleId = 2;
        $candidateRoleId = 3;
        $user = User::find($request->id);

        //TODO: подключить блоками кода через include
        if ($request->role_id == $companyRoleId) {
            $roleName = 'company';
/*            $user->NAME = $request->NAME;
            $user->COUNTRY = $request->COUNTRY;
            $user->CITY = $request->CITY;
            $user->PHONE = $request->PHONE;
            $user->EMPLOYEE_CNT = $request->EMPLOYEE_CNT;
            $user->WEB_SITE = $request->WEB_SITE;
            $user->DESCRIPTION = $request->DESCRIPTION;*/
        } elseif ($request->role_id == $candidateRoleId) {
            $roleName = 'candidate';
            $user->NAME = $request->NAME;
            $user->COUNTRY = $request->COUNTRY;
            $user->CITY = $request->CITY;
            $user->PHONE = $request->PHONE;
            $user->CATEGORY_ID = $request->CATEGORY_ID;
            $user->LEVEL = $request->LEVEL;
            $user->YEARS_EXPERIENCE = $request->YEARS_EXPERIENCE;
            $user->SALARY = $request->SALARY;
            $user->YEARS_EXPERIENCE = $request->YEARS_EXPERIENCE;
            $user->EXPERIENCE = $request->EXPERIENCE;
            $user->EDUCATION = $request->EDUCATION;
            $user->SKILLS = $request->SKILLS;
            $user->LANGUAGES = $request->LANGUAGES;
            $user->ABOUT_ME = $request->ABOUT_ME;
        }


        $this->cacheService->deleteKeyFromCache('user_'.$user->id);


        $user->save();
        return redirect()->route('admin-users', ['name' => $roleName]);
    }


    //TODO: сделать функции типа deleteEntity, activateEntity
    public function deleteUser(Request $request) {
        $vacancy = User::find($request->id);
        $vacancy->delete();
        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->VACANCY_ID);
        return back();
    }




}
