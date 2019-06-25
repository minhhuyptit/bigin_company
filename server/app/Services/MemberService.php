<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use App\Services\Contracts\MemberServiceInterface;

require_once app_path() . '/configs/constants.php';

class MemberService extends BaseService implements MemberServiceInterface {
    public function __construct(MemberRepository $memberRepository) {
        $this->repository = $memberRepository;
    }

    public function login(string $email, string $password) {
        $res = $this->repository->login($email, $password);
        return $this->responseLogin($res);
    }

    private function responseLogin($res) {
        if (!empty($res)) {
            $res['role'] = $res->member_role['value'];
            $listUnset = ['member_role', 'created_at', 'updated_at'];
            $this->removeElements($res, $listUnset);
            return $this->response(200, LOGIN_SUCCESS, $res);
        } else {
            return $this->response(404, LOGIN_FAIL);
        }
    }
}
