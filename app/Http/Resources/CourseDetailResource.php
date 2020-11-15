<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'time'=> $this->time,
            'fee'=> $this->fee,
            'image_id'=> $this->name,
            'description'=> $this->description,
            'sale_off'=> $this->sale_off,
            'units' => UnitDetailResource::collection($this->units)->toArray(null),
        ];
    }
}
