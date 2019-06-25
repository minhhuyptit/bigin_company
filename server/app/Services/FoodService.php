<?php

namespace App\Services;

use App\Services\Contracts\FoodServiceInterface;
use App\Repositories\FoodRepository;

class FoodService extends BaseService implements FoodServiceInterface
{
    public function __construct(FoodRepository $repository)
    {
        $this->repository = $repository;
    }

}
