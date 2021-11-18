<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $guarded = [];

    public function books(){
        return $this->belongsToMany('App\Models\Book')->withTimestamps();
    }
}