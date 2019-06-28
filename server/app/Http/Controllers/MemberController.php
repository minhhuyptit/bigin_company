<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class MemberController extends Controller {
    protected $service;
    // protected $memberServices;

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
        return $request;
    }

    public function destroy($id) {}

    public function login(LoginRequest $request) {
        // return $request->header();
        $credentials = $request->only('email', 'password');
        return $this->service->login($credentials);
    }

    public function logout(Request $request) {
        return $this->service->logout($request);
    }

    public function refresh()
    {
        return $this->service->response(200, REFRESH_TOKEN_SUCCESS, JWTAuth::getToken()->get());
    }
};
