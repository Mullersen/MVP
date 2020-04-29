<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportation';

    public function Route(){
        return $this->belongsTo('App\Route');
    }
}
