<?php

namespace App\Services\Member;

use App\Enums\MemberStatus;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\MemberInterface;
use App\Services\ProduceServiceInterface;
use Illuminate\Http\Request;

class CreateMemberService implements ProduceServiceInterface
{
    /**
     * @var MemberInterface
     */
    protected $memberRepository;

    /**
     * @var ActivationInterface
     */
    protected $activationRepository;

    /**
     * CreateUserService constructor.
     * @param MemberInterface $userRepository
     */
    public function __construct(MemberInterface $memberRepository, ActivationInterface $activationRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->activationRepository = $activationRepository;
    }

    /**
     * @param Request $request
     *
     * @return Member|false|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function execute(Request $request, array $options = [])
    {
        //Sweep expired activation code
        $this->activationRepository->removeExpired();
        $member = $this->memberRepository->create([
            'fullname'  => $request->input('fullname'),
            'password'  => $request->input('password'),
            'is_male'   => $request->input('is_male'),
            'birthday'  => $request->input('birthdays'),
            'phone'     => $request->input('phone'),
            'email'     => $request->input('email'),
            'status'    => MemberStatus::PENDING(),
            'role' => 3,
        ]);
        $this->activationRepository->createActivation($member);
        return $member;
    }
}
