<?php

namespace App;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class PersonneMorale extends Model
{
    use Uuids;
    public $incrementing = false;
    protected $table = "personnes_morales";

    public function courriers()
    {
        return $this->hasMany('App\Courrier');
    }
}
