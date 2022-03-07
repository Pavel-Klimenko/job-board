<?php

namespace App\Http\Controllers;
use function Doctrine\Common\Cache\Psr6\get;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Roles;
use App\Models\User;
use App\Constants;
use App\Services\Helper;
use Illuminate\Http\Request;

class AdminController extends BaseController
{

    public function renderAdminPanel() {
        $roles = new Roles();
        $roles = $roles->all();
        return view('admin_area.main', compact('roles'));
    }


    public function renderUserList($userType) {
            $users = new User();
            $roleName = Constants::USER_ROLE_NAMES[$userType];
            $roleId = Helper::getRoleIdByName($roleName);
            $users = $users->where('role_id', $roleId)->get();


            foreach ($users as $user) {
                dump($user->NAME);
            }


/*        $roles = new Roles();
        $roles = $roles->all();
        return view('admin_area.main', compact('roles'));*/
    }




    //$candidates = User::candidates();

}
