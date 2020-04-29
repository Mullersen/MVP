<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportations';

    public function Route(){
        return $this->belongsTo('App\Route');
    }
}
