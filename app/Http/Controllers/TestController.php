<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models;


class TestController extends BaseController
{

/*    public function addReview(Request $request)
    {
        $review = new Models\Reviews();
        $review->NAME = $request->NAME;
        $review->REVIEW = $request->REVIEW;
        $review->save();
    }*/


    public function phpinfo()
    {
        phpinfo();
    }






    
}
