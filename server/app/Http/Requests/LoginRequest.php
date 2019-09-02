<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'bail|required|email',
            'password'  => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'      => trans('validation.required',  ['attribute' => trans('member.forms.email')]),
            'email.email'         => trans('validation.email',     ['attribute' => trans('member.forms.email')]),
            'password.required'   => trans('validation.required',  ['attribute' => trans('member.forms.password')]),
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json(
            [
                'status' => 404,
                'message' => $validator->errors(),
                'data' => [],
            ]
            )
        );
    }
}
