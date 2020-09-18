<?php

namespace App\Http\Requests\Admin\News;

use App\Http\Requests\BaseRequest;

class NewsPostStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_category_id' => 'required|integer',
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
