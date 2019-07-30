<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Services\TeamService;

class TeamController extends Controller {
    protected $service;

    public function __construct(TeamService $teamService) {
        $this->service = $teamService;
    }

    public function index() {
        $option = ['del_flag' => 0];
        return $this->service->all($option);
    }

    public function store(TeamRequest $request) {
        $arrRequest = $request->only('name', 'leader', 'description');
        $arrRequest['created_by'] = $request->user()->id;
        $res = $this->service->create($arrRequest);
        return $this->responseCommon($res, CREATE_CONFIG_SUCCESS, CREATE_CONFIG_FAIL);
    }

    public function show($id) {
        $res = $this->service->find($id);
        return $this->responseCommon($res, GET_TEAM_SUCCESS, GET_TEAM_FAIL, TEAM_NOT_FOUND);
    }

    public function update(TeamRequest $request, $id) {
        $arrRequest = $request->only('name', 'leader', 'description');
        $arrRequest['modified_by'] = $request->user()->id;
        $res = $this->service->update($id, $arrRequest);
        return $this->responseCommon($res, UPDATE_TEAM_SUCCESS, UPDATE_TEAM_FAIL, TEAM_NOT_FOUND);
    }

    public function destroy($id) {
        return $this->service->delete($id);
    }

    public function listMember(int $id) {
        return $this->service->listMember($id);
    }
}
