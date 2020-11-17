<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $question = $this->resource;

        $answers = $question->answers;
        $dataAnswer = [];
        foreach ($answers as $answer) {
            $dataAnswer[] = [
                'id' => $answer->id,
                'answer' => $answer->answer,
                'is_right_answer' => $answer->is_right_answer,
            ];
        }
        return [
            'id' => $question->id,
            'question' => $question->question,
            'image_id' => $question->image_id,
            'audio_id' => $question->audio_id,
            'explain_result' => $question->explain_result,
            'answers' => $dataAnswer,
        ];
    }
}
