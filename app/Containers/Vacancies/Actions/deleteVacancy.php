<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Vacancies\Actions;

use App\Containers\Vacancies\Models\Vacancies;
use App\Ship\Contracts\CacheContract;


class deleteVacancy
{
    //TODO подключить репозиторий в конструкторе (работа с БД)

    //TODO разобраться с Request


    public function run($request) {
        $vacancy = Vacancies::find($request->VACANCY_ID);
        $vacancy->delete();
    }

}