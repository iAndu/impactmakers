<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\InstitutionType;
use App\InstitutionRating;
use App\Feedback;
use App\Photo;

class Institution extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'deleted_at', 'status'];

    public function type()
    {
        return $this->belongsTo(InstitutionType::class);
    }

    public function ratings()
    {
        return $this->hasMany(InstitutionRating::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
