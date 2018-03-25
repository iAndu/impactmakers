<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['institution_id', 'path'];
    public $timestamps = false;
}
