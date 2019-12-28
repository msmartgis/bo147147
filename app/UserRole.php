<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "users_roles";


    public function users()
    {
        return $this->hasMany('App\User');
    }
}
