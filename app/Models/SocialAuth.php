<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAuth extends Model
{
    protected $table = 'social_auth';
    protected $fillable = ['id_user', 'id_in_social', 'email', 'name', 'social_slug'];
}
