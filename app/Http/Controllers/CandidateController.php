<?php

namespace App\Http\Controllers;

use App\Models\InterviewInvitations;
use App\Models\User;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\JobCategories;




class CandidateController extends BaseController
{

    /**Get Vacancies using filter
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCandidates(Request $request)
    {

        $arrRequest = $request->all();
        $candidates = User::candidates();


        if ($request->has('CATEGORY_NAME')) {
            $model = JobCategories::class;
            $category = Helper::getTableRow($model, 'NAME', $arrRequest['CATEGORY_NAME']);
            $arrRequest['CATEGORY_ID'] = $category->ID;
        }


        if (!empty($arrRequest)) {
            $filterParams = ['LEVEL', 'CATEGORY_ID', 'CITY'];

            //assembling filter params
            $arrFilter = [];
            foreach ($arrRequest as $paramName => $paramValue) {
                if (in_array($paramName, $filterParams)) {
                    $arrFilter[$paramName] = $paramValue;
                }
            }

            //filtering collection
            if (!empty($arrFilter)) {
                foreach ($arrFilter as $key => $value) {
                    $candidates = $candidates->where($key, $value);
                }
            }

            //sorting results
            if ($request->has('SORT')) {
                if ($arrRequest['SORT'] == 'maxExperience') {
                    $sortFiled = 'YEARS_EXPERIENCE';
                } elseif ($arrRequest['SORT'] == 'newest') {
                    $sortFiled = 'created_at';
                }
                $candidates = $candidates->orderBy($sortFiled, 'desc');
            }

        }

        $itemsOnPage = 2;
        $candidates = $candidates->paginate($itemsOnPage)->withQueryString();

        return view('lists.candidates', compact('candidates'));
    }


    /**Get candidate CV from the table
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCandidate($id)
    {

/*        $cachedItem = Redis::get('candidate_' . $id);
        dump($cachedItem);
        //caching
        if(isset($cachedItem)) {
            $candidate = json_decode($cachedItem, FALSE);
        }else {
            $candidate = User::find($id);
            Redis::set('candidate_' . $id, $candidate);
        }*/

        $candidate = User::find($id);

        $isCompanyFlag = Helper::isCompany();
        $isCandidate = Helper::isCandidate();
        $category = Helper::getTableRow(JobCategories::class, 'ID', $candidate->CATEGORY_ID);


        if ($isCompanyFlag) {
            $company = auth()->user();
            $companyVacancies = User::find($company->id)->vacancies;

            $invitations = User::find($company->id)
                ->allAdvices()
                ->where('CANDIDATE_ID', $candidate->id)
                ->first();

            return view('detail_pages.candidate',
                compact('candidate', 'category', 'isCompanyFlag', 'companyVacancies', 'invitations'));
        } elseif ($isCandidate) {
            return view('detail_pages.candidate',
                compact('candidate', 'category', 'isCompanyFlag'));
        } else {
            return view('detail_pages.candidate',
                compact('candidate', 'category'));
        }

    }


    public function createVacancyInquiry(Request $request) {
        $inquries = new InterviewInvitations();
        $inquries->COMPANY_ID = $request->COMPANY_ID;
        $inquries->CANDIDATE_ID = $request->CANDIDATE_ID;
        $inquries->VACANCY_ID = $request->VACANCY_ID;
        $inquries->COVERING_LETTER = $request->COVERING_LETTER;
        $inquries->save();
    }


}
