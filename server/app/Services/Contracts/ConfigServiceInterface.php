<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;

interface ConfigServiceInterface extends ServiceInterface
{
    public function getConfigByType(string $type);
}