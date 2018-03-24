<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class InstitutionType extends Model
{
    protected $fillable = ['name', 'badge'];

    public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
}
