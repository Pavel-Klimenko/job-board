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


class getVacancy
{
    //TODO подключить репозиторий в конструкторе (работа с БД)

    //TODO разобраться с Request

    protected $cacheService;

    public function __construct($cacheService){
        $this->cacheService = $cacheService;
    }


    public function run($id) {
        $cachedObject = $this->cacheService->getObjectIntoCache('vacancy_'.$id);
        if (isset($cachedObject) && $cachedObject) {
            $vacancy = $cachedObject;
        } else {
            $vacancy = Vacancies::find($id);
            $this->cacheService->putObjectIntoCache('vacancy_'.$id, $vacancy);
        }

        return $vacancy;

    }

}