<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $table = 'addons';
    
    public function route(){
        return $this->belongsTo('App\Route');
    }
}
