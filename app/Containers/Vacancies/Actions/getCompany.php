<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Vacancies\Actions;

use Illuminate\Http\Request;

use App\Containers\Vacancies\Models\JobCategories;
use App\Containers\Vacancies\Models\Vacancies;

use App\Models\User;

use App\Ship\Helpers\Helper;


class getCompany
{
    //TODO подключить репозиторий в конструкторе (работа с БД)

    //TODO разобраться с Request

    public function run($vacancy) {
        return Helper::getTableRow(User::class, 'ID', $vacancy->COMPANY_ID);
    }

}