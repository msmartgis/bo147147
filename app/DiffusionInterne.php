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


    public function services()
    {
        return $this->belongsToMany('App\Service', 'service_diffusion_interne', 'diffusion_interne_id', 'service_id')->withPivot(['message'])->withTimestamps();
    }


    // public function sreviceResponsable()
    // {
    //     return $this->hasManyThrough('App\Service', 'App\PersonnePhysique');
    // }

    public function piece()
    {
        return $this->hasMany('App\Document');
    }


    public function natureDiffusion()
    {
        return $this->belongsTo('App\NatureDiffusion', 'nature_diffusion_id');
    }
}
