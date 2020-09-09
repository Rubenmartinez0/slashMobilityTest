<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'telephone', 'city',
    ];

    public function products(){
    	return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
