<?php

namespace App\Http\Requests;

use Log;
use App\Exceptions\WebException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Base StoreRequest
 */
abstract class BaseRequest extends FormRequest
{
    /**
     * @inheritdoc
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $messages = !empty($errors) ? $errors : __('validation.missing_field');
        Log::error($messages);

        throw new WebException('store_error', null, $messages);
    }
}
