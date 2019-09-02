<?php

namespace App\Services\Member;

use App\Enums\MemberStatus;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\MemberInterface;
use App\Services\ProduceServiceInterface;
use Illuminate\Http\Request;

class ConfirmEmailService implements ProduceServiceInterface
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
     * @return bool
     */
    public function execute(Request $request, array $options = [])
    {
        $member = $this->memberRepository->getFirstBy(['email' => $options['email'] ?? '']);
        if(!($member instanceof \App\Models\Member)){
           return false;
        }
        $result = $this->activationRepository->complete($member, $request->input('code') ?? '');
        if($result){
            $member->status = MemberStatus::ACTIVATED();
            $member->save();
        }
        return $result;
    }
}
