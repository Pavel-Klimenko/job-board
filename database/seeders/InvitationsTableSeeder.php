<?php
namespace Database\Seeders;

use App\Models\InterviewInvitations;
use App\Models\User;
use App\Models\Vacancies;
use App\Constants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class InvitationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $candidate = User::where('NAME', 'Pavel')->firstOrFail();
        $company = User::where('NAME', 'EPAM')->firstOrFail();
        $vacancy = Vacancies::where('COMPANY_ID', $company->id)->firstOrFail();

        InterviewInvitations::create(
            [
                'COMPANY_ID' => $company->id,
                'CANDIDATE_ID' => $candidate->id,
                'CANDIDATE_NAME' => $candidate->NAME,
                'VACANCY_ID' => $vacancy->ID,
                'VACANCY_NAME' => $vacancy->NAME,
                'STATUS' => Constants::INTERVIEW_ADVICES_STATUSES['ACCEPTED'],
            ]);

        $candidate = User::where('NAME', 'Olga')->firstOrFail();
        $vacancy = Vacancies::where('COMPANY_ID', $company->id)->firstOrFail();
        InterviewInvitations::create(
            [
                'COMPANY_ID' => $company->id,
                'CANDIDATE_ID' => $candidate->id,
                'CANDIDATE_NAME' => $candidate->NAME,
                'VACANCY_ID' => $vacancy->ID,
                'VACANCY_NAME' => $vacancy->NAME,
                'STATUS' => Constants::INTERVIEW_ADVICES_STATUSES['REJECTED'],
            ]);

        $candidate = User::where('NAME', 'Victor')->firstOrFail();
        $vacancy = Vacancies::where('COMPANY_ID', $company->id)->firstOrFail();
        InterviewInvitations::create(
            [
                'COMPANY_ID' => $company->id,
                'CANDIDATE_ID' => $candidate->id,
                'CANDIDATE_NAME' => $candidate->NAME,
                'VACANCY_ID' => $vacancy->ID,
                'VACANCY_NAME' => $vacancy->NAME,
                'CANDIDATE_COVERING_LETTER' => 'It has survived not only five centuries,
                     but also the leap into electronic typesetting, remaining essentially unchanged.
                     It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                     and more recently
                     with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'STATUS' => Constants::INTERVIEW_ADVICES_STATUSES['NO_STATUS'],
            ]);


        $company = User::where('NAME', 'iTechArt')->firstOrFail();
        $vacancy = Vacancies::where('COMPANY_ID', $company->id)->firstOrFail();

        InterviewInvitations::create(
            [
                'COMPANY_ID' => $company->id,
                'CANDIDATE_ID' => $candidate->id,
                'CANDIDATE_NAME' => $candidate->NAME,
                'VACANCY_ID' => $vacancy->ID,
                'VACANCY_NAME' => $vacancy->NAME,
                'STATUS' => Constants::INTERVIEW_ADVICES_STATUSES['ACCEPTED'],
            ]);

        $company = User::where('NAME', 'Giperlink')->firstOrFail();
        $vacancy = Vacancies::where('COMPANY_ID', $company->id)->firstOrFail();

        InterviewInvitations::create(
            [
                'COMPANY_ID' => $company->id,
                'CANDIDATE_ID' => $candidate->id,
                'CANDIDATE_NAME' => $candidate->NAME,
                'VACANCY_ID' => $vacancy->ID,
                'VACANCY_NAME' => $vacancy->NAME,
                'STATUS' => Constants::INTERVIEW_ADVICES_STATUSES['REJECTED'],
            ]);

        $company = User::where('NAME', 'Techin')->firstOrFail();
        $vacancy = Vacancies::where('COMPANY_ID', $company->id)->firstOrFail();

        InterviewInvitations::create(
            [
                'COMPANY_ID' => $company->id,
                'CANDIDATE_ID' => $candidate->id,
                'CANDIDATE_NAME' => $candidate->NAME,
                'VACANCY_ID' => $vacancy->ID,
                'VACANCY_NAME' => $vacancy->NAME,
                'CANDIDATE_COVERING_LETTER' => 'It has survived not only five centuries,
                     but also the leap into electronic typesetting, remaining essentially unchanged.
                     It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                     and more recently
                     with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'STATUS' => Constants::INTERVIEW_ADVICES_STATUSES['NO_STATUS'],
            ]);


    }
}
