<?php

namespace App;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class PersonneMorale extends Model
{
    use Uuids;
    public $incrementing = false;
    protected $table = "personnes_morales";


    public function getRaisonSocialeAttribute($value)
    {
        return ucfirst($this->raison_social);
    }

    public function courriers()
    {
        return $this->hasMany('App\Courrier');
    }

    public function representant()
    {
        return $this->hasOne('App\PersonnePhysique');
    }
}
