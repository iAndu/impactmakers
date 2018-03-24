<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\InstitutionType;

class Institution extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'deleted_at', 'status'];

    public function type()
    {
        return $this->belongsTo(InstitutionType::class);
    }
}
