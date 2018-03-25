<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['institution_id', 'name'];
    public $timestamps = true;
}
