<?php

namespace App\Services\Contracts;

interface MemberServiceInterface extends ServiceInterface
{
    public function login($email, $password);
}