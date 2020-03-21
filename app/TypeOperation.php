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
                if (\App::isLocale('en')) {
                    return "Ajout";
                } else {
                    return "اضافة";
                }

                break;

            case 'update':
                if (\App::isLocale('en')) {
                    return "Modification";
                } else {
                    return "تحديث";
                }

                break;

            case 'delete':

                if (\App::isLocale('en')) {
                    return "Supression";
                } else {
                    return "حذف";
                }
                break;

            case 'validate':
                if (\App::isLocale('en')) {
                    return "Validation";
                } else {
                    return "تأكيد";
                }

                break;

            case 'assignate':
                if (\App::isLocale('en')) {
                    return "Assignation";
                } else {
                    return "تكليف قسم أو مصلحة";
                }

                break;

            case 'cloture':
                if (\App::isLocale('en')) {
                    return "Cloturation";
                } else {
                    return "انجاز";
                }

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
