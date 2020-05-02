<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportations';

    public function route(){
        return $this->belongsTo('App\Route');
    }
}
