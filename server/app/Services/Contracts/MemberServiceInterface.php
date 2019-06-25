<?php

namespace App\Services\Contracts;

interface MemberServiceInterface extends ServiceInterface
{
    public function login(string $email, string $password);
}