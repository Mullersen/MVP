<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'route';

    public function addon(){
        return $this->hasMany('App\Addon');
    }
    public function transportation(){
        return $this->hasOne('App\Transportation');
    }

}
