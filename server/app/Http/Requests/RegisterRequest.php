<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'fullname'      => 'bail|required',
            'email'         => 'bail|required|email|unique:members,email',
            'password'      => 'bail|required|min:8|max:255|confirmed',
            'is_male'       =>  array('bail','sometimes','nullable', Rule::in([0,1])),
            'birthday'      => 'bail|sometimes|nullable|date',
            'phone'         =>  array('bail', 'sometimes', 'nullable', 'regex:/^(0[1|3|5|7|8|9])+([0-9]{8})$/')
        ];
    }

    /**
     * @return array
     */
    public function messages(){
        return [
            'email.required'      => trans('validation.required',  ['attribute' => trans('member.forms.email')]),
            'email.email'         => trans('validation.email',     ['attribute' => trans('member.forms.email')]),
            'email.unique'        => trans('validation.unique',    ['attribute' => trans('member.forms.email')]),
            'password.required'   => trans('validation.required',  ['attribute' => trans('member.forms.password')]),
            'password.min'        => trans('validation.min',       ['attribute' => trans('member.forms.password')]),
            'password.max'        => trans('validation.max',       ['attribute' => trans('member.forms.password')]),
            'password.confirmed'  => trans('validation.confirmed', ['attribute' => trans('member.forms.password')]),
            'fullname.required'   => trans('validation.required',  ['attribute' => trans('member.forms.fullname')]),
            'is_male.in'          => trans('validation.in',        ['attribute' => trans('member.forms.is_male')]),
            'birthday.date'       => trans('validation.date',      ['attribute' => trans('member.forms.birthday')]),
            'phone.regex'         => trans('validation.regex',     ['attribute' => trans('member.forms.phone')])
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
