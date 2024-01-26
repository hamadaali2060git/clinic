<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\ImageUploadTrait;

class DoctorResource extends JsonResource
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
            'type'=>$this->detail,
            'experience'=>$this->experience,
            'bio'=>$this->bio,
            'detail'=>$this->detail,
            'photo'=>$this->getFile('/img/profiles/', $this->photo,'/img/profiles/')
           
        ];

        
    }
}
