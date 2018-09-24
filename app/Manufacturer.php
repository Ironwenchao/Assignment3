<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //
    function itmes() {
        return $this->hasMany('App\Item');
}
}
