<?php
namespace App\Http\Controllers;

use App\Contracts\CacheContract;
use App\Constants;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\UserMessages;


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
            //echo 'вернул из кеша';
        } else {
            $this->cacheService->putObjectIntoCache('contact_data', $contactData);
            //echo 'добавил в кеш';
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


        $messagesTable = new UserMessages();
        $messagesTable->NAME = $request->NAME;
        $messagesTable->EMAIL = $request->EMAIL;
        $messagesTable->MESSAGE = $request->MESSAGE;
        $messagesTable->save();

        return redirect()->route('homepage');

    }

}
