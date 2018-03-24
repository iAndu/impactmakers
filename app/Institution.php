<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $guarded = ['id', 'deleted_at'];

    public function type()
    {
        return $this->belongsTo('App\InstitutionType');
    }
}
