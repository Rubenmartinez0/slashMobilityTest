<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	

	//protected $guarded = [];
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'description', 'image',
    ];


    public function provider(){
    	return $this->belongsTo(Provider::class);
    }
}
