<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface {
    protected $model;

    protected function setModel(Model $model) { //Review later
        $this->model = $model;
    }

    public function all() {
    }

    public function find($id) {
        $result = $this->_model->find($id);
        return $result;
    }

    public function create(array $data = []) {
    }

    public function update($id, array $data = []) {
    }

    public function delete($id) {
    }
}