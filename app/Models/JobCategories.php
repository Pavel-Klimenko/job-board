<?php

namespace App\Models;


//TODO перенес в конейнер. Удалить!

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategories extends Model
{
    protected $table = 'job_categories';
    protected $primaryKey = 'ID';
}
