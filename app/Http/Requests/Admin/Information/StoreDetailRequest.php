<?php

namespace App\Http\Requests\Admin\Information;

use App\Http\Requests\BaseRequest;

class StoreDetailRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'info_id' => 'required|integer',
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'boolean',
        ];
    }
}
