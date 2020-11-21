<?php

namespace App\Http\Resources;

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
        $questions = QuestionResource::collection($exercise->questions)->toArray(null);

        return [
            'id' => $exercise->id,
            'name' => $exercise->name,
            'content' => $exercise->content,
            'questions' => $questions,
            'total_question' => sizeof($questions),
        ];
    }
}
