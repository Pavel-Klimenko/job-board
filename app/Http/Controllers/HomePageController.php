<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reviews;
use App\Models\JobCategories;
use App\Models\Vacancies;
use App\Constants;

class HomePageController extends Controller
{

    public function renderHomePage()
    {

        $cities = DB::table('vacancies')->select('CITY')
            ->distinct()
            ->where('CITY', '<>', '')
            ->get();

        $jobCategories = JobCategories::all();
        $vacancyCategories = $this->getVacanciesCategories();

        $vacanciesQuantuty = 6;
        $vacancies = Vacancies::limit($vacanciesQuantuty)->get();

        $candidatesQuantuty = 15;
        $candidates = User::candidates()->limit($candidatesQuantuty)->get();

        $companiesQuantuty = 4;
        $companies = User::companies()->limit($companiesQuantuty)->get();

        $reviewsQuantuty = 10;
        $reviews = Reviews::limit($reviewsQuantuty)->get();

        return view('homepage',
            compact('cities',
                'jobCategories',
                'vacancyCategories',
                'vacancies',
                'candidates' ,
                'companies',
                'reviews'
            ));
    }


    private function getVacanciesCategories()
    {
        return Vacancies::select('CATEGORY_ID')->distinct()->limit(8)->get();
    }



    public function createUserReview(Request $request)
    {
        sleep(1);

        $request->validate([
            'NAME' => 'required|max:255',
            'REVIEW' => 'required|max:2500',
            'PHOTO' => 'required'
        ]);

        $imgPath = Constants::USER_IMAGE_FOLDERS['reviews'];
        $imageFullPath = $_SERVER['DOCUMENT_ROOT'].$imgPath;
        $fileExtension = Helper::getExtension($_FILES["PHOTO"]["name"]);
        $filename = uniqid() . '.' . $fileExtension;
        move_uploaded_file($_FILES["PHOTO"]["tmp_name"], $imageFullPath.$filename);
        $linkToImage = $imgPath.$filename;


        $review = new Reviews();

        $review->NAME = $request->NAME;
        $review->REVIEW = $request->REVIEW;
        $review->PHOTO = $linkToImage;


        $review->save();

        return redirect()->route('homepage');

    }

}
