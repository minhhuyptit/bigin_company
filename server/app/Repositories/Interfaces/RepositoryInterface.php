<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {

    /**
     * Get empty model.
     * @return \Eloquent|Model
     */
    public function getModel();

    /**
     * Runtime override of the model.
     *
     * @param string $model
     * @return $this
     */
    public function setModel($model);

    /**
     * Make a new instance of the entity to query on.
     *
     * @param array $with
     */
    public function make(array $with = []);

    /**
     * @param $data
     * @return Builder
     */
    public function applyBeforeExecuteQuery($data);

    /**
     * Find a single entity by key value.
     *
     * @param array $condition
     * @param array $select
     * @param array $with
     * @return mixed
     */
    public function getFirstBy(array $condition = [], array $select = [], array $with = []);

    /**
     * Get all models.
     *
     * @param array $with Eager load related models
     * @return Collection
     */
    public function all(array $with = []);

    /**
     * Get all models by key/value.
     *
     * @param array $condition
     * @param array $with
     * @param array $select
     *
     * @return Collection
     */
    public function allBy(array $condition, array $with = [], array $select = ['*']);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $condition
     * @param array $data
     * @return mixed
     */
    public function update(array $condition, array $data);

    /**
     * Delete model.
     *
     * @param Model $model
     * @return bool
     * @throws \Exception
     */
    public function delete(Model $model);

}
