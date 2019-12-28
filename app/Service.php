<?php

namespace App;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Uuids;
    public $incrementing = false;


    protected $fillable = [
        'ref',
        'nom'
    ];


    public function responsables()
    {
        return $this->hasMany('App\PersonnePhysique');
    }


    public function courriers()
    {
        return $this->belongsToMany('App\Courrier', 'courrier_service', 'courrier_id', 'service_id')->withPivot('message')->withTimestamps();
    }


    public function users()
    {
        return $this->hasMany('App\User');
    }
}
