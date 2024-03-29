<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'name_' . app()->getLocale() . ' as name'
        );
    }
    public function work_days()
    {
      return $this->hasOne(WorkDay::class,'day_id','id');
    }
}
