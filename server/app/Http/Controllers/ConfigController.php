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

    public function store(ConfigRequest $request) {
        $arrRequest = $request->only('value', 'type', 'description');
        $arrRequest['created_by'] = $request->user()->id;
        $res = $this->service->create($arrRequest);
        return $this->responseCommon($res, CREATE_CONFIG_SUCCESS, CREATE_CONFIG_FAIL);
    }

    public function show($type) {
        return $this->service->getConfigByType($type);
    }

    public function update(ConfigRequest $request, $id) {
        $arrRequest = $request->only('value', 'type', 'description');
        $arrRequest['modified_by'] = $request->user()->id;
        $res = $this->service->update($id, $arrRequest);
        return $this->responseCommon($res, UPDATE_CONFIG_SUCCESS, UPDATE_CONFIG_FAIL, CONFIG_NOT_FOUND);
    }

    public function destroy($id) {
        return $this->service->delete($id);
    }
}
