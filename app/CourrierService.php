<?php

namespace App;

use App\Traits\Uuids;
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
