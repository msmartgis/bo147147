<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getFullNameAttribute($value)
    {
        return ucfirst($this->nom) . ' ' . ucfirst($this->prenom);
    }



    public function consignes()
    {
        return $this->hasMany('App\Consigne');
    }


    public function hitorique()
    {
        return $this->hasMany('App\Historique');
    }


    public function role()
    {
        return $this->belongsToMany('App\UserRole', 'user_role', 'user_id', 'role_id');
    }


    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }
}
