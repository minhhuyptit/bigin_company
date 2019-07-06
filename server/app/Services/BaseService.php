<?php

namespace App\Services;

use App\Configs\Messages;
use App\Repositories\BaseRepository;
use App\Services\Contracts\ServiceInterface;

abstract class BaseService implements ServiceInterface {
    protected $repository;

    protected function setRepository(BaseRepository $repository) { //Review later
        $this->repository = $repository;
    }

    public function all() {
    }

    public function find($id) {
        return $this->repository->find($id);
    }
    public function create(array $data = []) {
        return $this->repository->create($data);
    }

    public function update($id, array $data = []) {
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }
    public function removeElements($array, $listUnset) {
        foreach ($listUnset as $val) {
            unset($array[$val]);
        }
    }

    public function response($status = 404, $message = '', $data = []) {
        return [
            'status' => $status,
            'message' => Messages::messages($message, 'en'),
            'data' => $data,
        ];
    }
}