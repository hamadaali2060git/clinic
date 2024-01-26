<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
            'name',
            'url'
        );
    }
}
