<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberRegistration extends Model
{
    protected $guarded = [];
    
    public function memberDefaults()
    {
       return $this->belongsTo('App\Models\MemberDefaults', 'id');
    }
}