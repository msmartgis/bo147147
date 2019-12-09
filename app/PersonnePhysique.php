<?php

namespace App;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class PersonnePhysique extends Model
{
    use Uuids;
    public $incrementing = false;
    protected $table = "personnes_physiques";


    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function courriers()
    {
        return $this->hasMany('App\Courrier');
    }
}
