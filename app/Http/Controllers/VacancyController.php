<?php
namespace App\Http\Controllers;

use App\Contracts\CacheContract;
use App\Models\InterviewInvitations;
use App\Models\JobCategories;
use App\Models\User;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Vacancies;


class VacancyController extends BaseController
{

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }


    public function getVacancies(Request $request)
    {

        $arrRequest = $request->all();
        $vacancies = new Vacancies();


        if ($request->has('CATEGORY_NAME')) {
            $model = JobCategories::class;
            $category = Helper::getTableRow($model, 'NAME', $arrRequest['CATEGORY_NAME']);
            $arrRequest['CATEGORY_ID'] = $category->ID;
        }


        $filterParams = ['CATEGORY_ID', 'CITY', 'COMPANY_ID'];

        if (!empty($arrRequest)) {

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
                    $vacancies = $vacancies->where($key, $value);
                }
            }

            //sorting results
            if ($request->has('SORT')) {
                if ($arrRequest['SORT'] == 'highestSalary') {
                    $sortFiled = 'SALARY_FROM';
                } elseif ($arrRequest['SORT'] == 'newest') {
                    $sortFiled = 'created_at';
                }
                $vacancies = $vacancies->orderBy($sortFiled, 'desc');
            }

        }

        $itemsOnPage = 4;
        $vacancies = $vacancies->paginate($itemsOnPage)->withQueryString();


        return view('lists.browse_job', compact('vacancies'));
    }




    public function createVacancy(Request $request)
    {
        sleep(1);

        $request->validate([
            'NAME' => 'required|max:255',
            'COUNTRY' => 'required|max:255',
            'CITY' => 'required|max:255',
            'CATEGORY_ID' => 'required|not_in:0',
            'SALARY_FROM' => 'required|max:255',
            'DESCRIPTION' => 'required|max:2500',
            'RESPONSIBILITY' => 'required|max:2500',
            'QUALIFICATIONS' => 'required|max:2500',
            'BENEFITS' => 'required|max:2500',
        ]);

        $vacancies = new Vacancies();

        $vacancies->NAME = $request->NAME;
        $vacancies->ICON = Auth::user()->ICON;
        $vacancies->IMAGE = Auth::user()->IMAGE;
        $vacancies->COUNTRY = $request->COUNTRY;
        $vacancies->CITY = $request->CITY;
        $vacancies->CATEGORY_ID = $request->CATEGORY_ID;
        $vacancies->COMPANY_ID = Auth::user()->id;
        $vacancies->SALARY_FROM = $request->SALARY_FROM;
        $vacancies->DESCRIPTION = $request->DESCRIPTION;
        $vacancies->RESPONSIBILITY = Helper::convertTextPointsToJson($request->RESPONSIBILITY);
        $vacancies->QUALIFICATIONS = Helper::convertTextPointsToJson($request->QUALIFICATIONS);
        $vacancies->BENEFITS = $request->BENEFITS;
        $vacancies->save();

        return redirect()->route('personal-vacancies');
    }



    public function getVacancy($id)
    {
        $cachedObject = $this->cacheService->getObjectIntoCache('vacancy_'.$id);
        if (isset($cachedObject) && $cachedObject) {
            $vacancy = $cachedObject;
            //echo 'вернул из кеша';
        }else {
            $vacancy = Vacancies::find($id);
            $this->cacheService->putObjectIntoCache('vacancy_'.$id, $vacancy);
            //echo 'добавил в кеш';
        }

        $category = Helper::getTableRow(JobCategories::class, 'ID', $vacancy->CATEGORY_ID);
        $company = Helper::getTableRow(User::class, 'ID', $vacancy->COMPANY_ID);

        $isCandidateFlag = Helper::isCandidate();
        $isCompanyFlag = Helper::isCompany();

        if ($isCandidateFlag) {
            $candidate = auth()->user();

            $candidateInvitation = InterviewInvitations::select('ID','STATUS')
                ->where('CANDIDATE_ID', $candidate->id)
                ->where('COMPANY_ID', $company->id)
                ->where('VACANCY_ID', $vacancy->ID)
                ->first();

            return view('detail_pages.vacancy',
                compact('vacancy', 'category', 'company', 'isCompanyFlag', 'isCandidateFlag', 'candidateInvitation'));
        } elseif ($isCompanyFlag) {
            return view('detail_pages.vacancy',
                compact('vacancy', 'category', 'company', 'isCandidateFlag', 'isCompanyFlag'));
        } else {
            return view('detail_pages.vacancy',
                compact('vacancy', 'category', 'company'));
        }
    }


    public function deleteVacancy(Request $request)
    {
        $row = Vacancies::find($request->VACANCY_ID);
        $row->delete();
        return back();
    }

}
