<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\WorkTime;
class DayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        if($this->work_days){
            $work_times=WorkTime::where("work_day_id",$this->work_days->id)->get();
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'work_days'=>$this->work_days,
                'work_times'=>$work_times,
                // 'description'=>$this->description,
                // 'image'=>url('/img/articles/' . $this->image),
                // 'date'=>$this->date,
            ];
        }else{
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'work_days'=>null,
                'work_times'=>null,
                // 'description'=>$this->description,
                // 'image'=>url('/img/articles/' . $this->image),
                // 'date'=>$this->date,
            ];
        }
    }
}
