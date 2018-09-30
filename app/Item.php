<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['manufacturer_id','name', 'price', 'type', 'description','image'];
    
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }
    
    function review() {
        return $this->hasMany('App\Review');
    }
    
   function users() {
        return $this -> belongsToMany('App\User', 'reviews')->withPivot('id')->withPivot('rating')->withPivot('detail')->withTimestamps();
    }
}
