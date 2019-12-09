<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    use Uuids;
    public $incrementing = false;

    public function courrier()
    {
        return $this->belongsTo('App\Courrier', 'courrier_id');
    }
}
