<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonDetailResource extends JsonResource
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
            'description'=> $this->description,
            'total_view'=> $this->total_view,
            'video_id'=> $this->video_id,
            'content'=> $this->content,
            'exercises' => ExerciseResource::collection($this->exercises)->toArray(null),
        ];
    }
}
