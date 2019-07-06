<?php

namespace App\Http\Requests;

use App\Configs\Messages;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

require_once app_path() . '/configs/constants.php';

class TeamMemberRequest extends FormRequest {
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
        return [
            'member_id' => 'bail|required|integer|exists:members,id',
            'team_id' => 'bail|required|integer|exists:teams,id',
            'team_member_role' => 'bail|required|integer|exists:configurations,id',
        ];
    }

    public function messages() {
        return [
            'member_id.required' => EMPTY_MEMBER,
            'member_id.integer' => MEMBER_MUST_BE_NUMERIC,
            'member_id.exists' => MEMBER_NOT_EXIST,
            'team_id.required' => EMPTY_TEAM,
            'team_id.integer' => TEAM_MUST_BE_NUMERIC,
            'team_id.exists' => TEAM_NOT_EXIST,
            'team_member_role.required' => EMPTY_TEAM_MEMBER_ROLE,
            'team_member_role.integer' => TEAM_MEMBER_MUST_BE_NUMERIC,
            'team_member_role.exists' => TEAM_MEMBER_ROLE_NOT_EXIST,
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
