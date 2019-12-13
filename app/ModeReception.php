<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ModeReception extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = "modes_receptions";

    public function getModeNameAttribute($value)
    {
        return ucwords($this->nom);
    }

    public function courriers()
    {
        return $this->hasMany('App\Courrier');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
