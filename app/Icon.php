<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = ['name', 'path'];
    public $timestamps = false;
}
