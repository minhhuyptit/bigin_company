<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\MemberService;
use Illuminate\Http\Request;
use JWTAuth;

class MemberController extends Controller {
    protected $service;

    public function __construct(MemberService $memberServices) {
        $this->service = $memberServices;
    }

    public function index() {}

    public function store(Request $request) {
        return $request;
    }

    public function show($id) {

    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {}

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        return $this->service->login($credentials);
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
