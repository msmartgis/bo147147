<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class NatureDiffusion extends Model
{
    use Uuids;
    protected $table = "natures_diffusions";

    public $incrementing = false;
}
