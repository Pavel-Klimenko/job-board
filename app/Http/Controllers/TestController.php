<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models;
use \Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

use App\Events\CandidateInvitation;



class TestController extends BaseController
{
    public function testMethod(Request $request)
    {

        $companyId = 'companyId';
        $vacancyId = 'vacancyId';

        event(new CandidateInvitation($companyId, $vacancyId));

        //$id = 3;
        //Cache::put('keyTEST', 'TEST', $seconds = 3500);
        //$value = Cache::get('keyTEST');
        //dump($value);
/*        $key = 'post_' . $id;
        $candidate = Cache::get($key);
        if($candidate === null) {
            $candidate = User::findOrFail($id);
            echo 'Кладем кандидата';
            dump($candidate);
            Cache::put($key, $candidate, 900);
        }


        $storage = Cache::getStore();
        $saved_page = Cache::get($key);
        dump($saved_page);*/
        //$sender = (object)['name' => 'test', 'email' => 'test@gmail.com', 'message' => 'Test message', 'subject' => 'Test subject'];
//        $result = false;
//
//        if($request->ajax() && !empty($request->all()))
//        {
            //$sender = $request;

           // Mail::send('mail.candidateNotification', ['sender' => $sender], function($message) use ($sender) {
           //     $message->from($sender->email, $sender->name);
            //    $message->to('mr-freeman89@mail.ru');
           //     $message->subject($sender->subject);
          //  });
            //$result = true;
        //return response()->json(['result' => $result]);

    }



    public function phpinfo()
    {
        phpinfo();
    }

}
