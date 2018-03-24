<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class InstitutionType extends Model
{
	protected static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
        	// Disable foreign keys. DANGEROUS
    		// \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        });
    }

    protected $fillable = ['name', 'icon_id'];

    public function institutions()
    {
        return $this->hasMany('App\Institution', 'type_id');
    }
    
    public function icon()
    {
        return $this->belongsTo('App\Icon');
    }
}
