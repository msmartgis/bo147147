<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class EtatCourrier extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'etats_courriers';
}
