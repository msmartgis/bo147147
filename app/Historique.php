<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = "historiques";

    public function courrier()
    {
        return $this->belongsTo('App\Courrier', 'courrier_id');
    }


    public function operation_type()
    {
        return $this->belongsTo('App\TypeOperation', 'type_operation_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
