<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class CategorieCourrier extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = "categorie_courriers";


    public function courrier()
    {
        return $this->hasMany('App\Courrier');
    }
}
