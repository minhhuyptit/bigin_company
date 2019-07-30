<?php

namespace App\Services\Contracts;

interface ServiceInterface
{
    public function all($otpion = []);

    public function find($id);

    public function create(array $data = []);

    public function update($id, array $data = []);

    public function delete($id);

    public function getIdUserFromToken();
}