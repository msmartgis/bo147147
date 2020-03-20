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
                if (\App::isLocale('en')) {
                    return "Brouillon";
                } else {
                    return "مسودة";
                }

                break;

            case 'cloturer':
                if (\App::isLocale('en')) {
                    return "Cloturé";
                } else {
                    return "منجزة";
                }

                break;

            case 'en_cours':
                if (\App::isLocale('en')) {
                    return "En Cours";
                } else {
                    return "حالية";
                }

                break;

            case 'en_retard':
                if (\App::isLocale('en')) {
                    return "En Retard";
                } else {
                    return "متأخرة";
                }

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
