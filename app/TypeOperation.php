<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class TypeOperation extends Model
{
    use Uuids;
    public $incrementing = false;
    protected $table = "types_operations";


    public function getTypeOperationNomAttribute($value)
    {

        switch ($this->nom) {
            case 'create':
                return "Ajout";
                break;

            case 'update':
                return "Modification";
                break;

            case 'delete':
                return "Supression";
                break;

            case 'validate':
                return "Validation";
                break;

            case 'assignate':
                return "Assignation";
                break;

            case 'cloture':
                return "Cloturation";
                break;

            default:
                return $value;
                break;
        }
    }

    public function hitorique()
    {
        return $this->hasMany('App\Historique');
    }
}
