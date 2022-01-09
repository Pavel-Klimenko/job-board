<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use App\Constants;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\UserMessages;


class ContactController extends BaseController
{
    /**Rendering the page with JobBoard info
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderContactPage() {
        $contactData = [
          'ADDRESS' => Constants::ADDRESS,
          'PHONE' => Constants::PHONE,
          'EMAIL' => Constants::EMAIL
        ];
        return view('contact', $contactData);
    }

    public function addUserMessage(Request $request)
    {
        sleep(1);

        $request->validate([
            'NAME' => 'required|max:255',
            'EMAIL' => 'required|max:255',
            'MESSAGE' => 'required|max:5000',
        ]);


        $messagesTable = new UserMessages();
        $messagesTable->NAME = $request->NAME;
        $messagesTable->EMAIL = $request->EMAIL;
        $messagesTable->MESSAGE = $request->MESSAGE;
        $messagesTable->save();

        return redirect()->route('homepage');

    }

}
