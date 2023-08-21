<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\HomePage\Actions;

use App\Containers\Vacancies\Models\JobCategories;
use App\Containers\Vacancies\Models\Vacancies;
use App\Models\User;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;

class renderHomePage
{
    public function run() {
        $cities = DB::table('vacancies')->select('CITY')
            ->distinct()
            ->where('CITY', '<>', '')
            ->where('ACTIVE', 1)
            ->get();

        $jobCategories = JobCategories::all();
        $vacancyCategories = $this->getVacanciesCategories();

        $vacancies = Vacancies::limit(6)->where('ACTIVE', 1)->get();
        $candidates = User::candidates()->limit(15)->where('ACTIVE', 1)->get();
        $companies = User::companies()->limit(4)->where('ACTIVE', 1)->get();
        $reviews = Reviews::limit(10)->where('ACTIVE', 1)->get();


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
        return Vacancies::select('CATEGORY_ID')
            ->distinct()
            ->where('ACTIVE', 1)
            ->limit(8)
            ->get();
    }
}