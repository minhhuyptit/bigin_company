<?php

namespace App\Repositories\Contracts;

interface MemberRepositoryInterface extends RepositoryInterface
{
    public function login(array $credentials);
}