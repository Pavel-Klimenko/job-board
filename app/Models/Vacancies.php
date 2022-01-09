<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vacancies extends Model
{
    protected $table = 'vacancies';
    protected $primaryKey = 'ID';
}
