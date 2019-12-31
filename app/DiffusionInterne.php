<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DiffusionInterne extends Model
{
    use SoftDeletes;
    use Uuids;
    public $incrementing = false;

    protected $table = "diffusions_internes";

    protected $fillable = [
        'ref',
        'date_envoi',
        'objet',
        'observations'
    ];
}
