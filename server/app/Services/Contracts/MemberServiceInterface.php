<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;

interface MemberServiceInterface extends ServiceInterface
{
    public function login(array $credentials);

    public function logout(Request $request);

    public function updateProfile(UpdateProfileRequest $request, int $id);
}