<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $guarded = [];

    public function characters()
    {
        return $this->hasMany('App\character');
    }

}
