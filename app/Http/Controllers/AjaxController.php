<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Vacancies;

class AjaxController extends Controller
{

    public function getVacancyById(Request $request) {


        $vacancy = Vacancies::find($request->ID);

        //$msg = "This is a simple message.";
        //echo $msg;


        return response()->json(array('vacancy'=> $vacancy), 200);
    }


 /*   public function index() {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }*/
}
