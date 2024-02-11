<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
        if($this->reviews){
            return [
                'id'=>$this->id,
                'price'=>$this->price,
                'date'=>$this->date,
                'time'=>$this->time,
                'type'=>$this->type,
                'status'=>$this->status,
                'categories'=>$this->categories,
                'patient'=>$this->user_appointment,
                'workdays'=>$this->workdays,
                'reviews'=>$this->reviews,
            ];
        }else{
            return [
                'id'=>$this->id,
                'price'=>$this->price,
                'date'=>$this->date,
                'time'=>$this->time,
                'type'=>$this->type,
                'status'=>$this->status,
                'categories'=>$this->categories,
                'patient'=>$this->user_appointment,
                'workdays'=>$this->workdays,
            ];
        }
    }
}
