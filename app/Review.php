<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'rate',
            'comment',
            'date',
            'time'
        );
    }
}
