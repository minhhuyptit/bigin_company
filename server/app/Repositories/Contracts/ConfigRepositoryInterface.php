<?php

namespace App\Repositories\Contracts;

interface ConfigRepositoryInterface extends RepositoryInterface
{
    public function getConfigByType(string $type);
}