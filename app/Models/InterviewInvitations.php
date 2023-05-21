<?php

namespace App\Models;

//TODO перенес в конейнер. Удалить!

use App\Constants;
use App\Services\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewInvitations extends Model
{
/*    protected $table = 'invitations_to_interview';
    protected $primaryKey = 'ID';

    public function scopeAccepted($query) {
        return $query->where('STATUS', 'accepted');
    }

    public function scopeRejected($query) {
        return $query->where('STATUS', 'rejected');
    }

    public function scopeNostatus($query) {
        return $query->where('STATUS', 'no_status');
    }*/

}
