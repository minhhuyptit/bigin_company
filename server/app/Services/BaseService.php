<?php

namespace App\Services;

use App\Services\Contracts\ServiceInterface;

abstract class BaseService implements ServiceInterface
{
    protected $_repository;

    public function __construct()
    {
        die("4");
        $this->setModel();
    }

    abstract public function getRepository();

    public function setModel()
    {
        die("5");
        $this->_repository = app()->make(
            $this->getRepository()
        );
    }

    public function all()
    {
    }

    public function find($id)
    {
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