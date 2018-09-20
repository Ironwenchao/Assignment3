<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['manufacturer_id','name', 'price', 'type', 'description'];
    
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }
}
