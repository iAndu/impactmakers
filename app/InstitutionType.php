<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionType extends Model
{
    protected $fillable = ['name', 'badge'];

    public function icon()
    {
        return $this->belongsTo('App\Icon');
    }
}
