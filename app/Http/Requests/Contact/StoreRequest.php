<?php

namespace App\Http\Requests\Contact;

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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:11',
            'email' => 'required|email',
            'note' => 'string',
        ];
    }
}
