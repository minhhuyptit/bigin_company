<?php

namespace App\Services\Contracts;

interface TeamServiceInterface extends ServiceInterface
{
    public function listMember(int $id);
}