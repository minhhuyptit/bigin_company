<?php

namespace App\Services;

use App\Repositories\TeamRepository;
use App\Services\Contracts\TeamServiceInterface;
use Carbon\Carbon;

require_once app_path() . '/configs/constants.php';

class TeamService extends BaseService implements TeamServiceInterface {
    public function __construct(TeamRepository $repository) {
        $this->repository = $repository;
    }

    // Overide
    public function all($option = []) {
        $data = parent::all($option);
        if ($data === false) {
            return $this->response(500, GET_ALL_TEAM_FAIL);
        }

        $listUnset = ['member_leader'];
        foreach ($data as $val) {
            $val['leader'] = $val->member_leader->fullname;
            $this->removeElements($val, $listUnset);
        }
        return $this->response(200, GET_ALL_TEAM_SUCCESS, $data);
    }

    // Overide
    public function delete($id) {
        $option = [
            'del_flag' => true,
            'modified_by' => $this->getIdUserFromToken(),
        ];
        $res = $this->repository->update($id, $option);
        if ($res === false) {
            return $this->response(500, DELETE_TEAM_FAIL);
        }
        if ($res === NOT_FOUND) {
            return $this->response(404, TEAM_NOT_FOUND);
        }
        return $this->response(200, DELETE_TEAM_SUCCESS, $res);
    }

    public function listMember(int $id) {
        $team = $this->find($id);
        if (empty($team)) {
            return $this->response(404, TEAM_NOT_FOUND);
        }
        $team_members = $team->members;

        $listUnset = ['is_male', 'birthday', 'email', 'phone', 'role', 'team_members'];
        try {
            foreach ($team_members as $val) {
                $teamMember = $this->getOneTeamMember($val->team_members, $id); // Remove unrelated teams
                $val['joinning_day']   = Carbon::parse($teamMember->created_at)->format('d-m-Y H:i:s');
                $val['role_in_team']   = $teamMember->member_role->value;
                $val['team_member_id'] = $teamMember->id;
                $this->removeElements($val, $listUnset);
            }
            return $this->response(200, GET_MEMBERS_OF_TEAM_SUCCESS, $team_members);
        } catch (\Exception $ex) {
            return $ex->getMessage();
            return $this->response(500, GET_MEMBERS_OF_TEAM_FAIL);
        }

    }

    private function getOneTeamMember($team_member, int $id) {
        if (count($team_member) >= 2) {
            foreach ($team_member as $key => $val) {
                if ($val['team_id'] === $id) {
                    return $team_member[$key];
                }
            }
        }
        return $team_member;
    }

}
