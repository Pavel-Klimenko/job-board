<?php
namespace App\Containers\Vacancies\UI\WEB\Controllers;


use App\Containers\Vacancies\Actions;

use App\Contracts\CacheContract;
use App\Events\NewEntityCreated;
use App\Models\User;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

use App\Containers\Vacancies\Models\Vacancies;
use Illuminate\Support\Facades\Hash;


class VacancyController extends BaseController
{

    //TODO перенести все в actions

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }

    public function getVacancyById(Request $request) {
        $vacancy = Vacancies::find($request->ID);
        return response()->json(array('vacancy'=> $vacancy), 200);
    }


    public function getVacancies(Request $request)
    {
        $getVacancies = new Actions\getVacancies();
        //TODO разобраться с Request
        $vacancies = $getVacancies->run($request);



/*        $arrRequest = $request->all();
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
        $vacancies = $vacancies->where('ACTIVE', 1)->paginate($itemsOnPage)->withQueryString();*/



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

        $arrVacancyFields = [
            'NAME' => $request->NAME,
            'ICON' => Auth::user()->ICON,
            'IMAGE' => Auth::user()->IMAGE,
            'COUNTRY' => $request->COUNTRY,
            'CITY' => $request->CITY,
            'CATEGORY_ID' => $request->CATEGORY_ID,
            'COMPANY_ID' => Auth::user()->id,
            'SALARY_FROM' => $request->SALARY_FROM,
            'DESCRIPTION' => $request->DESCRIPTION,
            'RESPONSIBILITY' => Helper::convertTextPointsToJson($request->RESPONSIBILITY),
            'QUALIFICATIONS' => Helper::convertTextPointsToJson($request->QUALIFICATIONS),
            'BENEFITS' => $request->BENEFITS
        ];


        $newVacancy = Vacancies::create($arrVacancyFields);

        //sending notification to admin
        $date = (object) [
            'entity' => 'vacancy',
            'message' =>  'Added new vacancy',
            'entity_id' => $newVacancy->ID,
        ];

        event(new NewEntityCreated($date));

        return redirect()->route('personal-vacancies');
    }


    public function getVacancy($id)
    {
        //TODO разобраться с инициированием классов

        $getVacancy= new Actions\getVacancy($this->cacheService);
        $vacancy = $getVacancy->run($id);

        if ($vacancy) {
            $getCategory = new Actions\getCategory();
            $category = $getCategory->run($vacancy);

            $getCompany = new Actions\getCompany();
            $company = $getCompany->run($vacancy);
        }


        $isCandidateFlag = Helper::isCandidate();
        $isCompanyFlag = Helper::isCompany();


        if ($isCandidateFlag) {
            $candidate = auth()->user();
            $getCandidateInvitations = new Actions\getCandidateInvitations();
            $candidateInvitation = $getCandidateInvitations->run($candidate, $company, $vacancy);

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
        $deleteVacancy = new Actions\deleteVacancy();
        //TODO разобраться с Request
        $deleteVacancy->run($request);
        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->VACANCY_ID);
        return back();
    }

    public function updateVacancy(Request $request)
    {
        sleep(1);
        $vacancy = Vacancies::find($request->VACANCY_ID);
        $vacancy->NAME = $request->NAME;
        $vacancy->ICON = Auth::user()->ICON;
        $vacancy->IMAGE = Auth::user()->IMAGE;
        $vacancy->COUNTRY = $request->COUNTRY;
        $vacancy->CITY = $request->CITY;
        $vacancy->CATEGORY_ID = $request->CATEGORY_ID;
        $vacancy->COMPANY_ID = Auth::user()->id;
        $vacancy->SALARY_FROM = $request->SALARY_FROM;
        $vacancy->DESCRIPTION = $request->DESCRIPTION;
        $vacancy->RESPONSIBILITY = Helper::convertTextPointsToJson($request->RESPONSIBILITY);
        $vacancy->QUALIFICATIONS = Helper::convertTextPointsToJson($request->QUALIFICATIONS);
        $vacancy->BENEFITS = $request->BENEFITS;
        $vacancy->ACTIVE = 0;
        $vacancy->save();

        $this->cacheService->deleteKeyFromCache('vacancy_'.$request->VACANCY_ID);

        //sending notification to admin
        $date = (object) [
            'entity' => 'vacancy',
            'message' =>  'Updated new vacancy',
            'entity_id' => $request->VACANCY_ID,
        ];

        event(new NewEntityCreated($date));

        return back();
    }

}
