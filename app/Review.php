<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'detail',
    ];
    
    function item() {
        return $this->belongsTo('App\Item');
    }
    
    function user() {
        return $this->belongsTo('App\User');
    }
}
