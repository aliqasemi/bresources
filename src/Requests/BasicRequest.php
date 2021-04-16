<?php

namespace Behamin\BResources\Requests;

use Behamin\BResources\Resources\BasicResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class BasicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response(new BasicResource([
            'error_message' => $validator->errors()->first(),
            'errors' => $validator->errors()
        ]), 422), $this->errorBag);
    }
}
