<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\InstitutionType;
use App\Photo;

class Institution extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'deleted_at', 'status'];

    public function type()
    {
        return $this->belongsTo(InstitutionType::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
