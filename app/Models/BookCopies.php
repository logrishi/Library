<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCopies extends Model
{
    public $guarded = [];

    public function books(){
        return $this->belongsTo('App\Models\Book');
    }

    public function getAccessionNoAttribute($value){
        return 'ACS'.$value;
    }
}