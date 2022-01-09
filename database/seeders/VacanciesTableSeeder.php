<?php

namespace Database\Seeders;

use App\Models\Reviews;
use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\JobCategories;
use TCG\Voyager\Models\Role;
use App\Constants;

class VacanciesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $category = JobCategories::where('NAME', 'PHP')->firstOrFail();
        $company = User::where('NAME', 'Giperlink')->firstOrFail();
        Vacancies::create([
            'NAME' => 'PHP Developer',
            'ICON' => Constants::DEMO_ICONS[0],
            'IMAGE' => Constants::DEMO_IMAGES['companies-giperlink'],
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 500,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        $category = JobCategories::where('NAME', 'java')->firstOrFail();
        $company = User::where('NAME', 'EPAM')->firstOrFail();
        Vacancies::create([
            'NAME' => 'Middle Java developer',
            'ICON' => Constants::DEMO_ICONS[1],
            'IMAGE' => Constants::DEMO_IMAGES['companies-epam'],
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 1500,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        $category = JobCategories::where('NAME', 'swift')->firstOrFail();
        $company = User::where('NAME', 'EPAM')->firstOrFail();
        Vacancies::create([
            'NAME' => 'Middle Swift developer',
            'ICON' => Constants::DEMO_ICONS[4],
            'IMAGE' => Constants::DEMO_IMAGES['companies-epam'],
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 2500,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        $category = JobCategories::where('NAME', 'go')->firstOrFail();
        $company = User::where('NAME', 'EPAM')->firstOrFail();
        Vacancies::create([
            'NAME' => 'Junior Go developer',
            'ICON' => Constants::DEMO_ICONS[2],
            'IMAGE' => Constants::DEMO_IMAGES['companies-epam'],
            'COUNTRY' => 'Ukraine',
            'CITY' => 'Kharkov',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 400,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);


        $category = JobCategories::where('NAME', 'ruby')->firstOrFail();
        $company = User::where('NAME', 'iTechArt')->firstOrFail();
        Vacancies::create([
            'NAME' => 'Senior Ruby developer',
            'ICON' => Constants::DEMO_ICONS[2],
            'IMAGE' => Constants::DEMO_IMAGES['companies-itechart'],
            'COUNTRY' => 'USA',
            'CITY' => 'Boston',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 5500,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        $category = JobCategories::where('NAME', 'javascript')->firstOrFail();
        $company = User::where('NAME', 'iTechArt')->firstOrFail();
        Vacancies::create([
            'NAME' => 'Front-end developer',
            'ICON' => Constants::DEMO_ICONS[3],
            'IMAGE' => Constants::DEMO_IMAGES['companies-itechart'],
            'COUNTRY' => 'Russia',
            'CITY' => 'Moscow',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 1200,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        $category = JobCategories::where('NAME', 'python')->firstOrFail();
        $company = User::where('NAME', 'Techin')->firstOrFail();
        Vacancies::create([
            'NAME' => 'Python developer',
            'ICON' => Constants::DEMO_ICONS[4],
            'IMAGE' => Constants::DEMO_IMAGES['companies-techin'],
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'CATEGORY_ID' => $category->ID,
            'COMPANY_ID' => $company->id,
            'SALARY_FROM' => 1000,
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'RESPONSIBILITY' => json_encode(['point 1', 'point 2']),
            'QUALIFICATIONS'=> json_encode(['point 1', 'point 2']),
            'BENEFITS' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
    }
}
