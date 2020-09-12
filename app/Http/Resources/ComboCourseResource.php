<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComboCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $courses = $this->courses;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'time' => $this->time,
            'fee' => $this->fee,
            'description' => $this->description,
            'sale_off' => $this->sale_off,
            'image_id' => $this->image_id,
            'courses' => SingleCourseResource::collection($courses),
        ];
    }
}
