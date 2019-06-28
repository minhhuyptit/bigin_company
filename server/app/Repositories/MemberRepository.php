<?php

namespace App\Repositories;

use App\Repositories\Contracts\MemberRepositoryInterface;
use App\Member;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class MemberRepository extends BaseRepository implements MemberRepositoryInterface
{

    public function __construct(Member $member)
    {
        $this->model = $member;
    }

    public function login(array $credentials)
    {
        return JWTAuth::attempt($credentials);
    }
}