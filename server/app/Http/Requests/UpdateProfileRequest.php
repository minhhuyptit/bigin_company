<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Configs\Messages;

require_once app_path() . '/configs/constants.php';

class UpdateProfileRequest extends FormRequest
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
            'fullname'      => 'bail|sometimes|required',
            'is_male'       => 'bail|sometimes|required|boolean',
            'birthday'      => 'bail|sometimes|required|date',
            'phone'         => array('bail', 'sometimes', 'required', 'regex:/^(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})$/'),
            'picture'       => 'bail|sometimes|required|mimes:jpeg,png,jpg,gif|max:3072'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'    => EMPTY_FULLNAME,
            'is_male.required'     => EMPTY_IS_MALE,
            'birthday.required'    => EMPTY_BIRTHDAY,
            'phone.required'       => EMPTY_PHONE,
            'picture.required'     => EMPTY_PICTURE,
            'is_male.boolean'      => FORMAT_INVALID_IS_MALE,
            'birthday.date'        => FORMAT_INVALID_BIRTHDAY,
            'phone.regex'          => FORMAT_INVALID_PHONE,
            'picture.mimes'        => FORMAT_INVALID_IMAGE,
            'picture.max'          => MAX_SIZE_PICTURE
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
