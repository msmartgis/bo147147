<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'types_documents';

    public function getNomAttribute($value)
    {
        return ucfirst($value);
    }
}
