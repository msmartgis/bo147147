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

    public function diffusionInterne()
    {
        return $this->belongsTo('App\DiffusionInterne', 'diffusion_interne_id');
    }



    public function typeDocument()
    {
        return $this->belongsTo('App\TypeDocument', 'type_document_id');
    }


    public function modeReception()
    {
        return $this->belongsTo('App\ModeReception', 'mode_reception_id');
    }
}
