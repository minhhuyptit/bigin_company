<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Configs\Messages;

require_once app_path() . '/configs/constants.php';

class ConfigRequest extends FormRequest
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
            'value'        => 'bail|required',
            'type'         => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'value.required'    => EMPTY_VALUE,
            'type.required'     => EMPTY_TYPE
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(response()->json(
            [
                'status'  => 404,
                'message' => Messages::messages($error),
                'data'    => []
            ]
        ));
    }
}
