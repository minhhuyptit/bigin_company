<?php

namespace App\Repositories;

use App\Repositories\Contracts\TeamRepositoryInterface;
use App\Team;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface{

    public function __construct(Team $team){
        $this->model = $team;
    }
}