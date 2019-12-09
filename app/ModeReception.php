<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ModeReception extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = "modes_receptions";


    public function courriers()
    {
        return $this->hasMany('App\Courrier');
    }
}
