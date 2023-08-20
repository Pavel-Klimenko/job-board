<?php


namespace App\Containers\Candidates\UI\WEB\Controllers;

use App\Containers\Vacancies\Models\InterviewInvitations;
use App\Models\User;
use App\Ship\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Containers\Vacancies\Models\JobCategories;
use App\Contracts\CacheContract;



class CandidateController extends BaseController
{
    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    /**Get Vacancies using filter
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCandidates(Request $request)
    {
        $arrRequest = $request->all();
        $candidates = User::candidates()->where('ACTIVE', 1);

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

        $itemsOnPage = 8;
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
        $cachedObject = $this->cacheService->getObjectIntoCache('user_'.$id);
        if (isset($cachedObject) && $cachedObject) {
            $candidate = $cachedObject;
        } else {
            $candidate = User::find($id);
            $this->cacheService->putObjectIntoCache('user_'.$id, $candidate);
        }

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
