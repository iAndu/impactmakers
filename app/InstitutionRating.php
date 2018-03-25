<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Institution;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionRating extends Model
{
    use SoftDeletes;
    
    protected $table = 'institutions_rating';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
