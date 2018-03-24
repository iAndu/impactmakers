<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Feedback;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeedbackRating extends Model
{
    use SoftDeletes;

    protected $table = 'feedbacks_rating';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
