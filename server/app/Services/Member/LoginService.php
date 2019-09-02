<?php

namespace App\Services\Member;

use App\Enums\MemberStatus;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\MemberInterface;
use App\Services\ProduceServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class LoginService implements ProduceServiceInterface {
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
    public function __construct(MemberInterface $memberRepository, ActivationInterface $activationRepository) {
        $this->memberRepository = $memberRepository;
        $this->activationRepository = $activationRepository;
    }

    /**
     * @param Request $request
     *
     * @return Member|false|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function execute(Request $request, array $options = []) {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        if (!empty($token)) {
            $member = Auth::user();
            switch ($member->status) {
            case MemberStatus::ACTIVATED()->value:
                $member['role'] = ucfirst($member->member_role['name']);
                $member['token'] = $token;
                $member['listTeam']  = $member->teams->pluck('name', 'id');
                return $member;
                break;
            case MemberStatus::PENDING()->value:
                $notification = app(config('general.notification'));
                $member->notify($notification);
                break;
            default:
                break;
            }
        }
        return false;
    }
}
