<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
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
            'name'=>$this->name,
            'url'=>url('/img/records/' . $this->url),
            'size'=>'12 MB',
            'date'=>$this->date,
            'time'=>$this->time,
            'day'=>$this->day,
        ];
    }
}
