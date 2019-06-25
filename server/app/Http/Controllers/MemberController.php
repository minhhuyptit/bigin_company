<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\MemberService;

class MemberController extends Controller
{
    protected $service;

    public function __construct(MemberService $memberServices)
    {
        //STT 5
        $this->service = $memberServices;
    }

    public function index()
    { }

    public function create()
    { }

    public function store(Request $request)
    { }

    public function show($id)
    {
        $res = $this->service->login("minhhuy97.ptit@gmail.com", md5("123456"));
        return $res;
    }

    public function edit($id)
    { }

    public function update(Request $request, $id)
    { }

    public function destroy($id)
    { }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        return $this->service->login($email, $password);
    }
};