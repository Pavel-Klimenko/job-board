<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use App\Constants;
use App\Services\Helper;

class AdminArea extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $roleName = Constants::USER_ROLE_NAMES['admin'];
            $roleId = Helper::getRoleIdByName($roleName);

            if($request->user()->role_id != $roleId) {
                return redirect('/');
            }
        }
        return $next($request);
    }

}

