<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    protected $table = 'work_days';
    public function worktimes()
    {
      return $this->hasMany(WorkTime::class,'work_day_id','id')->selection();
    }
    public function days()
    {
      return $this->belongsTo(Day::class,'day_id','id')->selection();
    }
    public function alldays()
    {
      return $this->belongsTo(Day::class,'day_id','id');
    }
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
          'day_id'
        );
    }
}
