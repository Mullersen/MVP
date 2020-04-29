<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $table = 'addon';
    public function route(){
        return $this->belongsTo('App\Route');
    }
}
