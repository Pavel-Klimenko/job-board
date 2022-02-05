<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\InterviewInvitations;
use \Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

use App\Events\CandidateInvitation;



class TestController extends BaseController
{
    public function testMethod(Request $request)
    {

        Cache::store(env('CURRENT_CACHE_SERVICE'))->flush();

    }



    public function phpinfo()
    {
        phpinfo();
    }

}
