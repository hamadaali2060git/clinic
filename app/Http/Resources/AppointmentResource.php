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
        return [
            'id'=>$this->id,
            'price'=>$this->price,
            'date'=>$this->date,
            'time'=>$this->time,
            'status'=>$this->status,
            'categories'=>$this->categories,
            'patient'=>$this->user_appointment,
            'workdays'=>$this->workdays,
            'workdays'=>$this->workdays,
            // 'photo'=>$this->getFile('/img/profiles/instructor/', $this->photo,'/img/profiles/')
           
        ];
    }
}
