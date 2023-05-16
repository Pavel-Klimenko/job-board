<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14/05/23
 * Time: 23:58
 */

namespace App\Containers\Vacancies\Actions;

use App\Containers\Vacancies\Models\JobCategories;
use App\Ship\Helpers\Helper;


class getCategory
{
    //TODO подключить репозиторий в конструкторе (работа с БД)
    //TODO разобраться с Request

    public function run($vacancy) {
        return Helper::getTableRow(JobCategories::class, 'ID', $vacancy->CATEGORY_ID);
    }

}