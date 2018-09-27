<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /*Here shows two types users one is simple user, the other one is moderator*/

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dateOfBirth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /*function items() {
        return $this->belongsToMany('App\Item','reviews');
    }*/
    
    function items() {
        return $this->belongsToMany('App\Item','reviews')->withPivot('detail');
    }
    

}
