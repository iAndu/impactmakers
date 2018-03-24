<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class InstitutionType extends Model
{
    protected $fillable = ['name', 'icon_id'];

    public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
    
    public function icon()
    {
        return $this->belongsTo('App\Icon');
    }
}
