<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Institution;
use App\FeedbackRating;

class Feedback extends Model
{
    use SoftDeletes;

    protected $table = 'feedbacks';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function ratings()
    {
        return $this->hasMany(FeedbackRating::class);
    }

    public function positiveRatings()
    {
        return $this->hasMany(FeedbackRating::class)->where('rating', 1);
    }

    public function negativeRatings()
    {
        return $this->hasMany(FeedbackRating::class)->where('rating', -1);
    }
}
