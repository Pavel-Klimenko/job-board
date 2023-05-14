<?php

namespace App\Models;


//TODO перенес в конейнер. Удалить!

use App\Services\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vacancies extends Model
{
    protected $guarded = [];
    protected $table = 'vacancies';
    protected $primaryKey = 'ID';

    public static $arrJsonFields = ['RESPONSIBILITY', 'QUALIFICATIONS'];

    public static function getVacancyFields() {
        return [
            'NAME', 'COUNTRY' , 'CITY', 'ACTIVE',
            'CATEGORY_ID', 'SALARY_FROM', 'DESCRIPTION',
            'RESPONSIBILITY', 'QUALIFICATIONS', 'BENEFITS'
        ];
    }

}
