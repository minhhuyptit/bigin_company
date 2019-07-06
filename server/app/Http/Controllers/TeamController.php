<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    protected $service;

    public function __construct(TeamService $teamService)
    {
        $this->service = $teamService;
    }

    public function index()
    {
        return $this->service->all();
    }

    public function store(TeamRequest $request)
    {
        $arrRequest = $request->only('name', 'leader', 'description');
        $arrRequest['created_by'] = $request->user()->id;
        $res = $this->service->create($arrRequest);
        return $this->responseCommon($res, CREATE_CONFIG_SUCCESS, CREATE_CONFIG_FAIL);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(TeamRequest $request, $id)
    {
        $arrRequest = $request->only('name', 'leader', 'description');
        $arrRequest['modified_by'] = $request->user()->id;
        $res = $this->service->update($id, $arrRequest);
        return $this->responseCommon($res, UPDATE_TEAM_SUCCESS, UPDATE_TEAM_FAIL, TEAM_NOT_FOUND);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function listMember(int $id){
        return $this->service->listMember($id);
    }
}
