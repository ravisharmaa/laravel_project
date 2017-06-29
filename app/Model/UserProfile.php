<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'users_profile';
    protected $fillable = ['firstname','user_id','lastname','address','user_image','phone_number','last_login'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
