<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use App\Services\Contracts\MemberServiceInterface;
use Illuminate\Support\Facades\Auth;

require_once app_path() . '/configs/constants.php';

class MemberService extends BaseService implements MemberServiceInterface {
    public function __construct(MemberRepository $memberRepository) {
        $this->repository = $memberRepository;
    }

    public function login(array $credentials) {
        $token = $this->repository->login($credentials);
        return $this->responseLogin($token);
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
}
