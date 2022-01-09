<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;
use App\Models\JobCategories;
use App\Constants;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //ROLES:

        $roleAdmin = Role::where('name', 'admin')->firstOrFail();
        $roleCandidate = Role::where('name', 'candidate')->firstOrFail();
        $roleCompany = Role::where('name', 'company')->firstOrFail();


        //ADMIN
        User::create([
            'NAME' => 'admin',
            'EMAIL' => 'admin@gmail.com',
            'password' => bcrypt('almaz'),
            'role_id' => $roleAdmin->id,
        ]);


        //CANDIDATES
        $category = JobCategories::where('NAME', 'PHP')->firstOrFail();
        User::create([
            'NAME' => 'Pavel',
            'ICON' => Constants::DEMO_ICONS[0],
            'IMAGE' => Constants::DEMO_IMAGES['candidate-pavel'],
            'EMAIL' => 'Pavel@test.com',
            'PHONE' => '+49722211155',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCandidate->id,
            'COUNTRY' => 'USA',
            'CITY' => 'Boston',
            'CATEGORY_ID' => $category->ID,
            'LEVEL' => 'Junior',
            'YEARS_EXPERIENCE' => '1',
            'SALARY' => 500,
            'EXPERIENCE' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'EDUCATION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'SKILLS' => json_encode(['PHP', 'SQL', 'JS']),
            'LANGUAGES' => json_encode(['english', 'russian']),
            'ABOUT_ME' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        $category = JobCategories::where('NAME', 'java')->firstOrFail();
        User::create([
            'NAME' => 'Olga',
            'ICON' => Constants::DEMO_ICONS[3],
            'IMAGE' => Constants::DEMO_IMAGES['candidate-olga'],
            'EMAIL' => 'Olga@test.com',
            'PHONE' => '+49722211315',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCandidate->id,
            'COUNTRY' => 'Spain',
            'CITY' => 'Madrid',
            'CATEGORY_ID' => $category->ID,
            'LEVEL' => 'Middle',
            'YEARS_EXPERIENCE' => '3',
            'SALARY' => 1500,
            'EXPERIENCE' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'EDUCATION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'SKILLS' => json_encode(['PHP', 'SQL', 'JS']),
            'LANGUAGES' => json_encode(['english', 'russian']),
            'ABOUT_ME' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        $category = JobCategories::where('NAME', 'python')->firstOrFail();
        User::create([
            'NAME' => 'Victor',
            'ICON' => Constants::DEMO_ICONS[5],
            'IMAGE' => Constants::DEMO_IMAGES['candidate-victor'],
            'EMAIL' => 'Victor@test.com',
            'PHONE' => '+49715811155',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCandidate->id,
            'COUNTRY' => 'Russia',
            'CITY' => 'Moscow',
            'CATEGORY_ID' => $category->ID,
            'LEVEL' => 'Senior',
            'YEARS_EXPERIENCE' => '10',
            'SALARY' => 4500,
            'EXPERIENCE' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'EDUCATION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'SKILLS' => json_encode(['PHP', 'SQL', 'JS']),
            'LANGUAGES' => json_encode(['english', 'russian']),
            'ABOUT_ME' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        $category = JobCategories::where('NAME', 'javascript')->firstOrFail();
        User::create([
            'NAME' => 'Alexander',
            'ICON' => Constants::DEMO_ICONS[2],
            'IMAGE' => Constants::DEMO_IMAGES['candidate-alexander'],
            'EMAIL' => 'Alexander@test.com',
            'PHONE' => '+49715811132',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCandidate->id,
            'COUNTRY' => 'Ukraine',
            'CITY' => 'Kiev',
            'CATEGORY_ID' => $category->ID,
            'LEVEL' => 'Middle',
            'YEARS_EXPERIENCE' => '4',
            'SALARY' => 2500,
            'EXPERIENCE' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'EDUCATION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'SKILLS' => json_encode(['PHP', 'SQL', 'JS']),
            'LANGUAGES' => json_encode(['english', 'russian']),
            'ABOUT_ME' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        //COMPANIES
        User::create([
            'NAME' => 'Giperlink',
            'ICON' => Constants::DEMO_ICONS[0],
            'IMAGE' => Constants::DEMO_IMAGES['companies-giperlink'],
            'EMAIL' => 'Giperlink@test.com',
            'PHONE' => '+49765821155',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCompany->id,
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'EMPLOYEE_CNT' => 20,
            'WEB_SITE' => 'https://giperlink.by/',
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        User::create([
            'NAME' => 'EPAM',
            'ICON' => Constants::DEMO_ICONS[1],
            'IMAGE' => Constants::DEMO_IMAGES['companies-epam'],
            'EMAIL' => 'EPAM@test.com',
            'PHONE' => '+49725811355',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCompany->id,
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'EMPLOYEE_CNT' => 100333,
            'WEB_SITE' => 'https://www.epam.com/',
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        User::create([
            'NAME' => 'iTechArt',
            'ICON' => Constants::DEMO_ICONS[2],
            'IMAGE' => Constants::DEMO_IMAGES['companies-itechart'],
            'EMAIL' => 'iTechArt@test.com',
            'PHONE' => '+49715821155',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCompany->id,
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'EMPLOYEE_CNT' => 2400,
            'WEB_SITE' => 'https://www.itechart.by/',
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        User::create([
            'NAME' => 'Belhard',
            'ICON' => Constants::DEMO_ICONS[2],
            'IMAGE' => Constants::DEMO_IMAGES['companies-belhard'],
            'EMAIL' => 'Belhard@test.com',
            'PHONE' => '+49215851155',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCompany->id,
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'EMPLOYEE_CNT' => 10500,
            'WEB_SITE' => 'https://www.belhard.com/',
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
        User::create([
            'NAME' => 'Techin',
            'ICON' => Constants::DEMO_ICONS[4],
            'IMAGE' => Constants::DEMO_IMAGES['companies-techin'],
            'EMAIL' => 'Techin@test.com',
            'PHONE' => '+49615813155',
            'password' => bcrypt('almaz'),
            'role_id' => $roleCompany->id,
            'COUNTRY' => 'Belarus',
            'CITY' => 'Minsk',
            'EMPLOYEE_CNT' => 50,
            'WEB_SITE' => 'http://www.techin.by/',
            'DESCRIPTION' => 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);
    }
}
