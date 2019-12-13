<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use Uuids;
    public $incrementing = false;
    protected $table = "types_documents";

    public function getNomTypeAttribute($value)
    {
        return ucfirst($this->nom);
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
