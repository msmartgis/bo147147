<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CourrierService extends Model
{

    protected $table = "courrier_service";
    public function getVuAttribute($value)
    {
        if ($this->vu == 0) {
            return "Lu";
        } else {
            return "Non Lu";
        }
    }
}
