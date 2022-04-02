<?php
namespace App\Http\Controllers;

use App\Contracts\CacheContract;
use App\Constants;
use App\Events\NewUserMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\UserMessages;
use Illuminate\Support\Facades\Auth;


class ContactController extends BaseController
{

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }


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

        $cachedObject = $this->cacheService->getObjectIntoCache('contact_data');
        if (isset($cachedObject) && $cachedObject) {
            $contactData = $cachedObject;
        } else {
            $this->cacheService->putObjectIntoCache('contact_data', $contactData);
        }

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

        $arrContactFields = [
            'NAME' => $request->NAME,
            'EMAIL' => $request->EMAIL,
            'MESSAGE' => $request->MESSAGE,
        ];

        UserMessages::create($arrContactFields);

        //sending notification to admin
        $date = (object) [
            'entity' => 'contact',
            'message' =>  'JobBoard user wrote a message to admin',
            'text' => $arrContactFields['MESSAGE'],
            //'entity_id' => $newContact,
        ];

        event(new NewUserMessage($date));

        return redirect()->route('homepage');
    }

}
