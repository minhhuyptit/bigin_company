<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoriesAbstract implements RepositoryInterface {

    /**
     * @var Eloquent | Model
     */
    protected $model;

    /**
     * @var Eloquent | Model
     */
    protected $originalModel;

    /**
     * RepositoriesAbstract constructor.
     * @param Model|Eloquent $model
     */
    public function __construct(Model $model) {
        $this->model = $model;
        $this->originalModel = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function resetModel() {
        $this->model = new $this->originalModel;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function make(array $with = []) {
        if (!empty($with)) {
            $this->model = $this->model->with($with);
        }
        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstBy(array $condition = [], array $select = ['*'], array $with = [])
    {
        $this->make($with);
        if (!empty($select)) {
            $data = $this->model->where($condition)->select($select);
        } else {
            $data = $this->model->where($condition);
        }
        return $this->applyBeforeExecuteQuery($data)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function applyBeforeExecuteQuery($data) {
        $this->resetModel();
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function all(array $with = []) {
        $data = $this->make($with);
        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function allBy(array $condition, array $with = [], array $select = ['*']) {
        if (!empty($condition)) {
            $this->applyConditions($condition);
        }
        $data = $this->make($with)->select($select);
        return $this->applyBeforeExecuteQuery($data)->get();
    }

/**
 * @param array $where
 * @param null|Eloquent|Builder $model
 */
    protected function applyConditions(array $where, &$model = null) {
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                switch (strtoupper($condition)) {
                case 'IN':
                    $newModel = $newModel->whereIn($field, $val);
                    break;
                case 'NOT_IN':
                    $newModel = $newModel->whereNotIn($field, $val);
                    break;
                default:
                    $newModel = $newModel->where($field, $condition, $val);
                    break;
                }
            } else {
                $newModel = $newModel->where($field, '=', $value);
            }
        }
        if (!$model) {
            $this->model = $newModel;
        } else {
            $model = $newModel;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data) {
        $data = $this->model->create($data);
        $this->resetModel();
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function update(array $condition, array $data) {
        $data = $this->model->where($condition)->update($data);
        $this->resetModel();
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Model $model) {
        return $model->delete();
    }

}
