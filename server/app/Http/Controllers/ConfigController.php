<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ConfigService;
use App\Http\Requests\ConfigRequest;

class ConfigController extends Controller
{
    protected $service;

    public function __construct(ConfigService $configServices) {
        $this->service = $configServices;
    }
    
    public function index()
    { 
        return $this->service->all();
    }

    public function create()
    { }

    public function store(ConfigRequest $request)
    { 
        $credentials = $request->only('value','type','description');
        return $this->service->create($credentials);
    }

    public function show($type)
    {
        return $this->service->getConfigByType($type);
    }

    public function edit($id)
    { }

    public function update(Request $request, $id)
    { }

    public function destroy($id)
    { }
}
