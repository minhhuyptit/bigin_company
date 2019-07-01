<?php

namespace App\Services;

use App\Services\Contracts\MemberServiceInterface;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Validator;

require_once app_path() . '/configs/constants.php';

class MemberService extends BaseService implements MemberServiceInterface {
    public function __construct(MemberRepository $memberRepository) {
        $this->repository = $memberRepository;
    }

    public function login(array $credentials) {
        $token = $this->repository->login($credentials);
        return $this->responseLogin($token);
    }

    public function logout(Request $request) {
        if($this->validateLogout($request)){
            return $this->response(404, EMPTY_TOKEN);
        }else{
            try{
                JWTAuth::invalidate($request->token);
                return $this->response(200, LOGOUT_SUCCESS);
            }catch(JWTException $ex){
                return $this->response(404, LOGOUT_FAIL);
            }
        }
    }

    public function updateProfile(Request $request, int $id){
        
    }

    private function responseLogin(string $token) {
        if (!empty($token)) {
            $user = Auth::user();
            $user['role'] = $user->member_role['value'];
            $user['token'] = $token;
            $listUnset = ['member_role', 'created_at', 'updated_at'];
            $this->removeElements($user, $listUnset);
            return $this->response(200, LOGIN_SUCCESS, $user);
        } else {
            return $this->response(404, LOGIN_FAIL);
        }
    }

    private function validateLogout(Request $request) {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        return $validator->fails();
    }
}
