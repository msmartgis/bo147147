<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use SoftDeletes;
    use Uuids;
    public $incrementing = false;


    protected $fillable = [
        'ref',
        'type',
        'date_reception',
        'date_envoie',
        'objet',
        'delai',
        'avis'
    ];


    public function modeReception()
    {
        return $this->belongsTo('App\ModeReception', 'mode_reception_id');
    }


    public function personnePhysique()
    {
        return $this->belongsTo('App\PersonnePhysique', 'personne_physique_id');
    }


    public function personneMorale()
    {
        return $this->belongsTo('App\PersonneMorale', 'personne_morale_id');
    }


    public function piece()
    {
        return $this->hasMany('App\Document');
    }

    public function hitorique()
    {
        return $this->hasMany('App\Historique');
    }



    public function remarqueConsigne()
    {
        return $this->hasMany('App\Consigne');
    }


    public function etat()
    {
        return $this->belongsTo('App\EtatCourrier', 'etat_id');
    }


    public function priorite()
    {
        return $this->belongsTo('App\Priorite', 'priorite_id');
    }


    public function accuse()
    {
        return $this->hasMany('App\Accuse');
    }


    public function services()
    {
        return $this->belongsToMany('App\Service', 'courrier_service', 'courrier_id', 'service_id')->withPivot(['message', 'vu'])->withTimestamps();
    }
}
