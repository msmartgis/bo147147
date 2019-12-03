<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = [
        'ref',
        'type',
        'date_reception',
        'date_envoie',
        'objet',
        'delai',
        'avis',
        'is_cloture',
        'personne_physique_id',
        'personne_morale_id',
        'etat_id',
        'mode_reception_id',
    ];
}
