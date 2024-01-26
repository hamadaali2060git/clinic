<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\ImageUploadTrait;

class UserResource extends JsonResource
{
    use ImageUploadTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'gender'=>$this->gender,
            'dateOfBirth'=>$this->dateOfBirth,
            'height'=>$this->height,
            'weight'=>$this->weight,
            'bloode_group'=>$this->bloode_group,
            'marital_status'=>$this->marital_status,
            'photo'=>$this->getFile('/img/profiles/', $this->photo,'/img/profiles/')
           
        ];
    }
}
