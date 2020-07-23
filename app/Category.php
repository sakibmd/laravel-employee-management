<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function employees(){
        return $this->belongsToMany('App\Employee')->withTimestamps();
    }
}
