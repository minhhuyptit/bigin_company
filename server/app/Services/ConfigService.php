<?php

namespace App\Services;
use App\Repositories\ConfigRepository;
use App\Services\Contracts\ConfigServiceInterface;

require_once app_path() . '/configs/constants.php';

class ConfigService extends BaseService implements ConfigServiceInterface {
    public function __construct(ConfigRepository $configRepository) {
        $this->repository = $configRepository;
    }

    // Overide
    public function all($option = []) {
        $data = $this->repository->all();
        if ($data === false) {
            return $this->response(500, GET_CONFIG_FAIL);
        }

        $res = $this->groupByConfig($data);
        return $this->response(200, GET_CONFIG_SUCCESS, $res);
    }

    // Overide
    public function delete($id) {
        $option = [
            'del_flag' => true,
            'modified_by' => $this->getIdUserFromToken(),
        ];
        $res = $this->repository->update($id, $option);
        if ($res === false) {
            return $this->response(500, DELETE_CONFIG_FAIL);
        }
        if ($res === NOT_FOUND) {
            return $this->response(404, CONFIG_NOT_FOUND);
        }
        return $this->response(200, DELETE_CONFIG_SUCCESS, $res);
    }

    public function getConfigByType(string $type) {
        $data = $this->repository->getConfigByType($type);
        if ($data === false) {
            return $this->response(500, GET_CONFIG_FAIL);
        }

        return $this->response(200, GET_CONFIG_SUCCESS, $data);
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
