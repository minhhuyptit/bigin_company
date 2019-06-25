<?php

namespace App\Repositories;

use App\Repositories\Contracts\MemberRepositoryInterface;
use App\Member;

class MemberRepository extends BaseRepository implements MemberRepositoryInterface
{

    public function __construct(Member $member)
    {
        $this->model = $member;
    }

    public function login(string $email, string $password)
    {
        return $this->model::where(['email' => $email, 'password' => $password, 'del_flag' => false])->first();
    }
}
