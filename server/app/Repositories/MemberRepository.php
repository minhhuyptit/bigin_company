<?php

namespace App\Repositories;
use App\Repositories\Contracts\MemberRepositoryInterface;

class MemberRepository extends BaseRepository implements MemberRepositoryInterface{

    //@Override
    public function getModel()
    {
        //STT 3
        return \App\Member::class;
    }

    public function login($email, $password)
    {
        // STT 7
    }

    
}