<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use App\Services\MemberService;

class MemberController extends Controller
{
    protected $memberServices;

    public function __construct(MemberService $memberServices)
    {
        //STT 5
        $this->memberServices = $memberServices;
    }

    public function index()
    { }

    public function create()
    { }

    public function store(Request $request)
    { }

    public function show($id)
    {
        $res = $this->memberServices->login("asdqwe", "qweqwe");
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
        // $service = new LoginService();
        // $res = $service->handle($request->email, md5($request->password));
        // return $res;
    }
}
