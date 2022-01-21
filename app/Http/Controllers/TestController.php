<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models;
use \Illuminate\Support\Facades\Mail;


class TestController extends BaseController
{
    public function testMethod(Request $request)
    {

        $sender = (object)['name' => 'test', 'email' => 'test@gmail.com', 'message' => 'Test message', 'subject' => 'Test subject'];
//        $result = false;
//
//        if($request->ajax() && !empty($request->all()))
//        {
            //$sender = $request;

            Mail::send('mail.candidateNotification', ['sender' => $sender], function($message) use ($sender) {
                $message->from($sender->email, $sender->name);
                $message->to('mr-freeman89@mail.ru');
                $message->subject($sender->subject);
            });

            //$result = true;
      }

        //return response()->json(['result' => $result]);

}
