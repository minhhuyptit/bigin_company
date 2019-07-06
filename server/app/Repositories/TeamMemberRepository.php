<?php

namespace App\Repositories;

use App\Repositories\Contracts\TeamMemberRepositoryInterface;
use App\TeamMember;

class TeamMemberRepository extends BaseRepository implements TeamMemberRepositoryInterface {

    public function __construct(TeamMember $team) {
        $this->model = $team;
    }

    public function checkTeamMemberExist($member, $team) {
        return $this->model->where(['member_id' => $member, 'team_id' => $team])->first();
    }
}