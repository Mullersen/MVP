<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Route extends Model implements TaggableInterface
{
    use TaggableTrait;
    protected $table = 'routes';

    public function addon(){
        return $this->hasMany('App\Addon');
    }
    public function transportation(){
        return $this->hasOne('App\Transportation');
    }
}
