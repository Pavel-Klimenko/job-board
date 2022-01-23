<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use App\Constants;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\Http\Controllers\Controller;

class JobController extends BaseController
{
    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function enqueue(Request $request)
    {
        $details = ['email' => 'mr-freeman89@mail.ru'];
        SendEmail::dispatch($details);
    }

}
