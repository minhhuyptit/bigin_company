<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamMemberRequest;
use App\Services\TeamMemberService;
use Illuminate\Http\Request;

class TeamMemberController extends Controller {
    protected $service;

    public function __construct(TeamMemberService $teamMemberService) {
        $this->service = $teamMemberService;
    }

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(TeamMemberRequest $request) {
        $arrRequest = $request->only('member_id', 'team_id', 'team_member_role');
        $arrRequest['created_by'] = $request->user()->id;
        return $this->service->create($arrRequest);
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        $res = $this->service->delete($id);
        return $this->responseCommon($res, DELETE_TEAM_MEMBER_SUCCESS, DELETE_TEAM_MEMBER_FAIL, TEAM_MEMBER_NOT_FOUND);
    }
}
