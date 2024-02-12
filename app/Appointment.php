<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    public function categories() {
        return $this->belongsTo(Category::class,"category_id","id")->selection();
    }
    public function user_appointment() {
      return $this->belongsTo(User::class,"user_id","id")->selection();
    }
    
    public function workdays() {
        return $this->belongsTo(WorkDay::class,"work_day_id","id")->with('days')->with('worktimes')->selection();
  
    }
    public function reviews()
    {
      return $this->hasOne(Review::class,'appointment_id','id');
    }
    
}
