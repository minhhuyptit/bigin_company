<?php

namespace App\Repositories;

use App\Repositories\Contracts\FoodRepositoryInterface;
use App\Food;

class FoodRepository extends BaseRepository implements FoodRepositoryInterface{

    public function __construct(Food $food){
        $this->model = $food;
    }
}