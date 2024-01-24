<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class WorkTime extends Model
{
    protected $table = 'work_times';
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
            'work_day_id',
            'time',
            'type'
        );
    }
}
