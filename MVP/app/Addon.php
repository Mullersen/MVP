<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Addon extends Model implements TaggableInterface
{
    use TaggableTrait;
    protected $table = 'addons';

    public function route(){
        return $this->belongsTo('App\Route');
    }
}
