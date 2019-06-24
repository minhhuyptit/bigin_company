<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $_model;

    public function __construct()
    {
        // STT 1
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        // STT 2
        $this->_model = app()->make(
            $this->getModel()   //callback getModel of MemberRepository
        );
    }

    public function all()
    {
    }

    public function find($id)
    {
        $result = $this->_model->find($id);
        return $result;
    }


    public function create(array $data = [])
    {
    }

    public function update($id, array $data = [])
    {
    }

    public function delete($id)
    {
    }
}