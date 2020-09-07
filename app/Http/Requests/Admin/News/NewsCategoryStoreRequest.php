<?php

namespace App\Http\Requests\Admin\News;

use App\Http\Requests\BaseRequest;

class NewsCategoryStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }
}
