<?php

namespace App\Http\Requests;

use App\Configs\Messages;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

require_once app_path() . '/configs/constants.php';

class ConfigRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rule = [
            'value' => 'bail|required',
        ];
        if ($this->getMethod() == 'POST') {
            $rule += ['type' => 'bail|required'];
        }
        return $rule;
    }

    public function messages() {
        return [
            'value.required' => EMPTY_VALUE,
            'type.required' => EMPTY_TYPE,
        ];
    }

    protected function failedValidation(Validator $validator) {
        $error = $validator->errors()->first();
        throw new HttpResponseException(response()->json(
            [
                'status' => 404,
                'message' => Messages::messages($error),
                'data' => [],
            ]
        ));
    }
}
