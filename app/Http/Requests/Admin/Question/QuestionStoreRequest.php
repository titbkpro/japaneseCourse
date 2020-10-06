<?php

namespace App\Http\Requests\Admin\Question;

use App\Http\Requests\BaseRequest;

class QuestionStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required',
            'explain_result' => 'required',
        ];
    }
}
