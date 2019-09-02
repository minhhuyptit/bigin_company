<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ProduceServiceInterface
{
    /**
     * Execute produce an entity
     *
     * @param Request $request
     * @param array $options
     * @return mixed
     */
    public function execute(Request $request, array $options = []);
}
