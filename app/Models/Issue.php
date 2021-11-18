<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Issue extends Model
{
    public $guarded = [];

    public function getAccessionNoAttribute($value)
    {
        return 'ACS' . $value;
    }
}