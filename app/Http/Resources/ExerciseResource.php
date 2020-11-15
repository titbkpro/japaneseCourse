<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use App\Models\Unit;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $exercise = $this->resource;

        return [
            'id' => $exercise->id,
            'name' => $exercise->name,
            'content' => $exercise->content,
            'questions' => QuestionResource::collection($exercise->questions)->toArray(null),
        ];
    }
}
