<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Configs\Messages;

require_once app_path() . '/configs/constants.php';

class TeamRequest extends FormRequest
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
        $id = $this->route()->parameters()['team'];
        return [
            'name'          => 'bail|required|unique:teams,name,'.$id,
            'leader'        => 'bail|required|exists:members,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => EMPTY_TEAM_NAME,
            'name.unique'       => IDENTICAL_TEAM_NAME,
            'leader.required'   => EMPTY_LEADER,
            'leader.exists'     => LEADER_NOT_EXIST
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
