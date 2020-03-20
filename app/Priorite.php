<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Priorite extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = "priorites_courriers";

    protected $fillable = [
        'nom'
    ];


    public function getPrioriteIconAttribute($value)
    {
        switch ($this->nom) {
            case "عادية":
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="أولوية عادية" ><img src="' . URL::to('/') . ('/images/svg/priorite_normale.svg') . '" width="30" height="30" ></i>';
                break;

            case "عاجلة":
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="عاجلة" ><img src="' . URL::to('/') . ('/images/svg/priorite_urgente.svg') . '" width="30" height="30" ></i>';
                break;

            case "عاجلة جدا":
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="جد عاجلة" ><img src="' . URL::to('/') . ('/images/svg/priortie_tres_urgente.svg') . '" width="30" height="30"></i>';
                break;

            default:
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="أولوية عادية" ><img src="' . URL::to('/') . ('/images/svg/priorite_normale.svg') . '" width="30" height="30"></i>';
                break;
        }
    }


    public function courrier()
    {
        return $this->hasMany('App\Courrier');
    }
}
