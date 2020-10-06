<?php

namespace App\Http\Requests\Admin\Exercise;

use App\Http\Requests\BaseRequest;

class ExerciseStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lesson_id' => 'required|integer',
            'name' => 'required|max:255',
        ];
    }
}
