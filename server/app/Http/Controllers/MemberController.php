<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\MemberInterface;
use App\Services\MemberService;
use App\Services\Member\ConfirmEmailService;
use App\Services\Member\CreateMemberService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use JWTAuth;

class MemberController extends Controller {

    use ResponseTrait;

    protected $service;

    public function __construct(MemberService $memberServices) {
        $this->service = $memberServices;
    }

    public function index() {
        return $this->service->all();
    }

    public function store(Request $request) {
        return $request;
    }

    public function show($id) {

    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {}

    public function register(RegisterRequest $request, CreateMemberService $createMemberService) {
        $member = $createMemberService->execute($request);
        $this->sendConfirmationToMember($member);
        //TODO Not working when using notify
        return $this->response(200, trans('member.register.success'));
    }

    public function confirm($email, Request $request, ConfirmEmailService $confirmEmailService) {
        $result = $confirmEmailService->execute($request, array('email' => $email));
        if($result === false){
            abort(404);
        }
        return redirect('http://localhost:3000/login');
    }

    public function resendConfirmation(Request $request, $email, MemberInterface $memberRepository, ActivationInterface $activationRepository)
    {
        $member = $memberRepository->getFirstBy(['email' => $email]);
        if (!$member) {
            return $this->response(404, trans('general.not_found', ['key' => trans('member.name')]));
        }
        $activation = $activationRepository->exists($member);
        if($activation === false){
            $activationRepository->removeExpired();
            $activationRepository->createActivation($member);
        }
        $this->sendConfirmationToMember($member);
        //TODO Not working when using notify
        return $this->response(200, trans('register.confirm.success'));
    }

    public function sendConfirmationToMember($member)
    {
        $notification = app(config('general.notification'));
        $member->notify($notification);
    }

    public function login(Request $request) {

        // return $this->service->login($credentials);
    }

    public function logout(Request $request) {
        return JWTAuth::invalidate(JWTAuth::getToken());
    }

    public function refresh() {
        $token = JWTAuth::getToken();
        return $this->service->response(200, REFRESH_TOKEN_SUCCESS, JWTAuth::refresh($token));
    }

    public function updateProfile(UpdateProfileRequest $request, int $id) {
        return $this->service->updateProfile($request, $id);
    }
};
