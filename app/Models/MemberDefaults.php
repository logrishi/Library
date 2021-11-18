<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberDefaults extends Model
{
    protected $guarded = [];
    
    public function memberRegistrations()
    {
       return $this->hasMany('App\Models\MemberRegistration');
    }
}