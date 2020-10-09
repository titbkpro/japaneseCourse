<?php

namespace App\Http\Requests\Admin\Answer;

use App\Http\Requests\BaseRequest;

class AnswerStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer' => 'required',
        ];
    }
}
