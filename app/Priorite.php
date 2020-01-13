<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
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
            case 'Normal':
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="Priorité Normale" ><img src="' . URL::to('/') . ('/images/svg/priorite_normale.svg') . '" width="30" height="30" ></i>';
                break;

            case 'Urgent':
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="Priorité Urgente" ><img src="' . URL::to('/') . ('/images/svg/priorite_urgente.svg') . '" width="35" height="35" ></i>';
                break;

            case 'Très Urgent':
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="Priorité Très Urgente" ><img src="' . URL::to('/') . ('/images/svg/priortie_tres_urgente.svg') . '" width="30" height="30"></i>';
                break;

            default:
                return '<i  data-toggle="tooltip" data-html="true"   data-placement="left" title="Priorité Normale" ><img src="' . URL::to('/') . ('/images/svg/priorite_normale.svg') . '" width="30" height="30"></i>';
                break;
        }
    }


    public function courrier()
    {
        return $this->hasMany('App\Courrier');
    }
}
