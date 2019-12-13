<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class EtatCourrier extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'etats_courriers';

    public function getEtatNomAttribute($value)
    {

        switch ($this->nom) {
            case 'brouillon':
                return "Brouillon";
                break;

            case 'cloturer':
                return "Cloturer";
                break;

            case 'en_cours':
                return "En Cours";
                break;

            case 'en_retard':
                return "En Retard";
                break;

            default:
                return $value;
                break;
        }
    }

    public function courrier()
    {
        return $this->hasMany('App\Courrier');
    }
}
