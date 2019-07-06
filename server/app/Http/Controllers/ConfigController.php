<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Services\ConfigService;

class ConfigController extends Controller {
    protected $service;

    public function __construct(ConfigService $configServices) {
        $this->service = $configServices;
    }

    public function index() {
        return $this->service->all();
    }

    public function create() {}

    public function store(ConfigRequest $request) {
        $arrayConfig = $request->only('value', 'type', 'description');
        $arrayConfig['created_by'] = $request->user()->id;
        $res = $this->service->create($arrayConfig);
        return $this->responseCommon($res, CREATE_CONFIG_SUCCESS, CREATE_CONFIG_FAIL);
    }

    public function show($type) {
        return $this->service->getConfigByType($type);
    }

    public function edit($id) {}

    public function update(ConfigRequest $request, $id) {
        $arrayConfig = $request->only('value', 'type', 'description');
        $arrayConfig['modified_by'] = $request->user()->id;
        $res = $this->service->update($id, $arrayConfig);
        return $this->responseCommon($res, UPDATE_CONFIG_SUCCESS, UPDATE_CONFIG_FAIL, CONFIG_NOT_FOUND);
    }

    public function destroy($id) {
        $res = $this->service->delete($id);
        return $this->responseCommon($res, DELETE_CONFIG_SUCCESS, DELETE_CONFIG_FAIL, CONFIG_NOT_FOUND);
    }
}
