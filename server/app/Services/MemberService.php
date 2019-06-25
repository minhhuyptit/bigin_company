<?php

namespace App\Services;

use App\Services\Contracts\MemberServiceInterface;
use App\Repositories\MemberRepository;

class MemberService extends BaseService implements MemberServiceInterface
{

    protected $memberRepository;

    // @Override
    public function getRepository()
    {
        return MemberRepository::class;
    }

    public function __construct(MemberRepository $memberRepository)
    {   
        //STT 4
        $this->memberRepository = $memberRepository;
    }

    public function login($email, $password)
    {   
        //STT 6
        $this->memberRepository->login("minhhuy", "qwe");
    }
}
