<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Consigne extends Model
{
    use Uuids;
    public $incrementing = false;



    public function courrier()
    {
        return $this->belongsTo('App\Courrier', 'courrier_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
