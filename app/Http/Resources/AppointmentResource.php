<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CategoryResource;

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
        $doctor=User::where("type","doctor")->selection()->first();
        if($this->reviews){
            return [
                
                'id'=>$this->id,
                'price'=>$this->price,
                'date'=>$this->date,
                'time'=>$this->time,
                'type'=>$this->type,
                'status'=>$this->status,
                'categories'=>new CategoryResource($this->categories),
                'patient'=>new UserResource($this->user_appointment),
                'doctor'=>new DoctorResource($doctor),
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
                'categories'=>new CategoryResource($this->categories),
                'patient'=>new UserResource($this->user_appointment),
                'doctor'=>new DoctorResource($doctor),
                'workdays'=>$this->workdays,
                'reviews'=>null,
            ];
        }
    }
}
