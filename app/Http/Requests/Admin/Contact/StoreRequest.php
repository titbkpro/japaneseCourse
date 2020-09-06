<?php

namespace App\Http\Requests\Admin\Contact;

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
            'contact_detail' => 'required',
            'status' => 'required|integer',
        ];
    }
}
