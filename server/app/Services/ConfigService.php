<?php

namespace App\Services;
use App\Repositories\ConfigRepository;
use App\Services\Contracts\ConfigServiceInterface;

require_once app_path() . '/configs/constants.php';

class ConfigService extends BaseService implements ConfigServiceInterface {
    public function __construct(ConfigRepository $configRepository) {
        $this->repository = $configRepository;
    }

    public function all() {
        $data = $this->repository->all();
        if ($data === false) return $this->response(500, GET_ALL_CONFIG_FAIL);
        $res = $this->groupByConfig($data);
        return $this->response(200, GET_ALL_CONFIG_SUCCESS, $res);
    }

    public function getConfigByType(string $type) {
        $data = $this->repository->getConfigByType($type);
        if($data === false) return $this->response(500, GET_ALL_CONFIG_FAIL);
        return $this->response(200, GET_ALL_CONFIG_SUCCESS, $data);
    }

    private function groupByConfig($data) {
        $arr = array();
        foreach ($data as $val) {
            $type = $val['type'];
            unset($val['type']); //Delete columns type before assigned
            $arr[$type][] = $val;
        }
        return $arr;
    }
}
