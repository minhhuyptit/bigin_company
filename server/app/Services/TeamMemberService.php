<?php

namespace App\Services;

use App\Configuration;
use App\Repositories\TeamMemberRepository;
use App\Services\Contracts\TeamMemberServiceInterface;

require_once app_path() . '/configs/constants.php';

class TeamMemberService extends BaseService implements TeamMemberServiceInterface {
    public function __construct(TeamMemberRepository $repository) {
        $this->repository = $repository;
    }

    // Overide
    public function create(array $data = []) {
        $config = Configuration::find($data['team_member_role']);
        if ($config->type !== 'team_member_role') {
            return $this->response(404, TYPE_CONFIG_INCORRECT);
        }

        $res = $this->repository->checkTeamMemberExist($data['member_id'], $data['team_id']);
        if ($res !== null) {
            return $this->response(404, IDENTICAL_TEAM_MEMBER);
        }

        $teamMember = parent::create($data);
        if ($teamMember === false) {
            return $this->response(500, CREATE_TEAM_MEMBER_FAIL);
        }

        $listUnset = ['is_male', 'birthday', 'email', 'phone', 'role'];
        $member = $teamMember->member;
        $member['joinning_day']   = $teamMember->created_at;
        $member['role_in_team']   = $config->value;
        $member['team_member_id'] = $teamMember->id;
        $this->removeElements($member, $listUnset);
        return $this->response(200, CREATE_TEAM_MEMBER_SUCCESS, $member);
    }

}
