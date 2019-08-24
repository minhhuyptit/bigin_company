<?php

namespace App\Repositories;

use App\Repositories\Contracts\MemberRepositoryInterface;
use App\Member;
use JWTAuth;
use App\Http\Requests\UpdateProfileRequest;

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

    public function updateProfile(Member $member, UpdateProfileRequest $request, string $picture){
        $member->fullname   = $request->fullname;
        $member->is_male    = $request->is_male;
        $member->birthday   = $request->birthday;
        $member->phone      = $request->phone;
        $member->picture    = empty($picture) ? $member->picture : $picture;
        try{
            $member->save();
            return $member;
        }catch(\Exception $ex){
            return false;
        }
    }


}
