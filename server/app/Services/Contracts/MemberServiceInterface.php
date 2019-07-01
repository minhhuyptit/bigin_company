<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface MemberServiceInterface extends ServiceInterface
{
    public function login(array $credentials);

    public function logout(Request $request);

    public function updateProfile(Request $request, int $id);
}