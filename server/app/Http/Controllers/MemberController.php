<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\UpdateProfileRequest;

class MemberController extends Controller {
    protected $service;

    public function __construct(MemberService $memberServices) {
        $this->service = $memberServices;
    }

    public function index() {}

    public function create() {}

    public function store(Request $request) {
        return $request;
    }

    public function show($id) {

    }

    public function edit($id) {}

    public function update(Request $request, $id) {
    }

    public function destroy($id) {}

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        return $this->service->login($credentials);
    }

    public function logout(Request $request) {
        return $this->service->logout($request);
    }

    public function refresh() {
        return $this->service->response(200, REFRESH_TOKEN_SUCCESS, JWTAuth::getToken());
    }

    public function updateProfile(UpdateProfileRequest $request, int $id) {
        return $this->service->updateProfile($request, $id);
    }
};
