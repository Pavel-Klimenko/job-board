<?php

namespace App\Http\Controllers;

use App\Events\VacancyInterviewRequest;
use App\Models\JobCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Events\CandidateInvitation;
use App\Contracts\CacheContract;

use App\Models\User;
use App\Models\Vacancies;
use App\Models\InterviewInvitations;
use App\Services\Helper;
use App\Constants;


class PersonalController extends BaseController
{

    protected $cacheService;

    public function __construct(CacheContract $cacheService){
        $this->cacheService = $cacheService;
    }



    public function getPersonalInfo()
    {
        $user = auth()->user();
        $title = 'Personal info';

        if (Helper::isCompany()) {
            return view('personal.companyInfo', compact('user', 'title'));
        } elseif (Helper::isCandidate()) {
            $jobCategories = JobCategories::all();
            $category = Helper::getTableRow(\App\Models\JobCategories::class, 'ID', $user->CATEGORY_ID);
            return view('personal.candidateInfo',
                compact('user', 'title', 'category', 'jobCategories'));
        }
    }


    public function getCompanyVacancies()
    {
        $title = 'Company vacancies';
        $user = auth()->user();
        $jobCategories = JobCategories::all();

        $itemsOnPage = 4;
        $vacancies = User::find($user->id)
            ->vacancies()
            ->paginate($itemsOnPage)
            ->withQueryString();

        return view('personal.vacancies',
            compact('vacancies', 'jobCategories', 'title'));
    }


    public function getIterviewRequests($requestsType)
    {
        $user = auth()->user();
        $isCompanyFlag = Helper::isCompany();
        $isCandidateFlag = Helper::isCandidate();

        $itemsOnPage = 2;
        switch ($requestsType) {
            case 'all':
                $title = 'All interview requests';
                $candidatesRequests = User::find($user->id)
                    ->allAdvices()
                    ->paginate($itemsOnPage)
                    ->withQueryString();
                break;
            case 'accepted':
                $title = 'Accepted interview requests';
                $candidatesRequests = User::find($user->id)
                    ->acceptedAdvices()
                    ->paginate($itemsOnPage)
                    ->withQueryString();

                break;
            case 'rejected':
                $title = 'Rejected interview requests';
                $candidatesRequests = User::find($user->id)
                    ->rejectedAdvices()
                    ->paginate($itemsOnPage)
                    ->withQueryString();
                break;
        }


        return view('personal.InterviewRequests',
            compact('candidatesRequests', 'title', 'isCompanyFlag', 'isCandidateFlag'));
    }



    public function changeAdviceStatus($INVITE_ID, $STATUS)
    {

        $invitation = InterviewInvitations::find($INVITE_ID);
        $candidate = User::find($invitation->CANDIDATE_ID);
        $company = User::find($invitation->COMPANY_ID);


        $invitation->STATUS = $STATUS;
        $invitation->save();


        //sending notification to candidate email
        if ($STATUS == 'rejected') {
            $message = 'Unfortunately company can\'t invite you to the interview';
        } elseif ($STATUS == 'accepted') {
            $message = 'You have been invited for an interview';
        }

       $date = (object)[
            'name' => Constants::SITE_NAME,
            'email' => Constants::EMAIL,
            'message' => $message,
            'candidate_email' => $candidate->EMAIL,
            'company_name' => $company->NAME,
            'company_email' => $company->EMAIL,
            'company_phone' => $company->PHONE,
            'company_website' => $company->WEB_SITE,
            'vacancy_id' => $invitation->VACANCY_ID,
            'vacancy_name' => $invitation->VACANCY_NAME,
        ];

        event(new CandidateInvitation($date));
        return back();
    }


    public function createInterviewInvite(Request $request)
    {

        $invitation = new InterviewInvitations();
        $vacancy = Helper::getTableRow(Vacancies::class, 'ID', $request->VACANCY_ID);


        if (Helper::isCompany()) {
            $invitation->COMPANY_ID = Auth::user()->id;
            $invitation->CANDIDATE_ID = $request->CANDIDATE_ID;
            $invitation->CANDIDATE_NAME = $request->CANDIDATE_NAME;
            $invitation->VACANCY_ID = $request->VACANCY_ID;
            $invitation->VACANCY_NAME = $vacancy->NAME;
            $invitation->STATUS = Constants::INTERVIEW_ADVICES_STATUSES['ACCEPTED'];

            $candidate = User::find($request->CANDIDATE_ID);

            //sending notification to candidate email
            $date = (object) [
                'name' => Constants::SITE_NAME,
                'email' => Constants::EMAIL,
                'message' => 'You are invited for an interview!',
                'candidate_email' => $candidate->EMAIL,
                'company_name' => Auth::user()->NAME,
                'company_email' => Auth::user()->EMAIL,
                'company_phone' => Auth::user()->PHONE,
                'company_website' => Auth::user()->WEB_SITE,
                'vacancy_id' => $request->VACANCY_ID,
                'vacancy_name' => $vacancy->NAME,
            ];

            event(new CandidateInvitation($date));
        }


        if (Helper::isCandidate()) {
            $invitation->COMPANY_ID = $request->COMPANY_ID;
            $invitation->CANDIDATE_ID = Auth::user()->id;
            $invitation->CANDIDATE_NAME = Auth::user()->NAME;
            $invitation->VACANCY_ID = $request->VACANCY_ID;
            $invitation->VACANCY_NAME = $vacancy->NAME;
            $invitation->CANDIDATE_COVERING_LETTER = $request->CANDIDATE_COVERING_LETTER;
            $invitation->STATUS = Constants::INTERVIEW_ADVICES_STATUSES['NO_STATUS'];

            $candidate = User::find(Auth::user()->id);
            $company = User::find($request->COMPANY_ID);

            //sending notification to candidate email
            $date = (object)[
                'name' => Constants::SITE_NAME,
                'email' => Constants::EMAIL,
                //'template' => '',
                'message' => 'Candidate send ad interview request',
                'company_email' => $company->EMAIL,
                'candidate_id' => $candidate->id,
                'candidate_name' => $candidate->NAME,
                'candidate_email' => $candidate->EMAIL,
                'candidate_phone' => $candidate->PHONE,
                'covering_letter' => $request->CANDIDATE_COVERING_LETTER,
                'vacancy_id' => $request->VACANCY_ID,
                'vacancy_name' => $vacancy->NAME,
            ];

            event(new VacancyInterviewRequest($date));

        }

        $invitation->save();
        return back();
    }


    public function uploadUserImage(Request $request)
    {
            if (Helper::isCompany()) {
                $imgPath = Constants::USER_IMAGE_FOLDERS['companies'];
            } elseif (Helper::isCandidate()) {
                $imgPath = Constants::USER_IMAGE_FOLDERS['candidates'];
            }


            $imageFullPath = $_SERVER['DOCUMENT_ROOT'].$imgPath;
            $fileExtension = Helper::getExtension($_FILES["IMAGE"]["name"]);
            $filename = uniqid() . '.' . $fileExtension;
            move_uploaded_file($_FILES["IMAGE"]["tmp_name"], $imageFullPath.$filename);

            $linkToImage = $imgPath.$filename;

            $user = User::find(Auth::user()->id);
            $user->IMAGE = $linkToImage;

            $user->save();
            return back();
    }


    public function updateUserInfo(Request $request)
    {
        sleep(1);

        $user = User::find(Auth::user()->id);

        if (Helper::isCompany()) {
            $user->NAME = $request->NAME;
            $user->COUNTRY = $request->COUNTRY;
            $user->CITY = $request->CITY;
            $user->PHONE = $request->PHONE;
            $user->EMPLOYEE_CNT = $request->EMPLOYEE_CNT;
            $user->WEB_SITE = $request->WEB_SITE;
            $user->DESCRIPTION = $request->DESCRIPTION;
        } elseif (Helper::isCandidate()) {
            $user->NAME = $request->NAME;
            $user->COUNTRY = $request->COUNTRY;
            $user->CITY = $request->CITY;
            $user->PHONE = $request->PHONE;
            $user->CATEGORY_ID = $request->CATEGORY_ID;
            $user->LEVEL = $request->LEVEL;
            $user->YEARS_EXPERIENCE = $request->YEARS_EXPERIENCE;
            $user->SALARY = $request->SALARY;
            $user->YEARS_EXPERIENCE = $request->YEARS_EXPERIENCE;
            $user->EXPERIENCE = $request->EXPERIENCE;
            $user->EDUCATION = $request->EDUCATION;
            $user->SKILLS = $request->SKILLS;
            $user->LANGUAGES = $request->LANGUAGES;
            $user->ABOUT_ME = $request->ABOUT_ME;
        }


        $this->cacheService->deleteKeyFromCache('user_'.$user->id);


        $user->save();
        return back();
    }


}
