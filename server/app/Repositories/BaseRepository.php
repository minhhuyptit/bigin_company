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
        try {
            return $this->model->all();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function find($id) {
        try {
            return $this->model->find($id);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function create(array $data = []) {
        try {
            return $this->model->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, array $data = []) {
        try {
            $item = $this->model->find($id);
            if($item === null) return NOT_FOUND;
            $item->update($data);
            return $item;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $item = $this->model->find($id);
            if($item === null) return NOT_FOUND;
            return $item->delete($id);
        } catch (\Exception $ex) {
            return false;
        }
    }
}