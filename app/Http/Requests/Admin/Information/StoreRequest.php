<?php

namespace App\Http\Requests\Admin\Information;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
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
            'info_details' => 'required|array',
            'info_details.*.title' => 'required|max:255',
            'info_details.*.content' => 'required',
            'info_details.*.status' => 'boolean',
        ];
    }
}
