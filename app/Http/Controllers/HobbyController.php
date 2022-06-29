<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HobbyRequest;
use App\Services\HobbyService;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    protected $service;

    public function __construct(
        HobbyService $service
    ) {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
    }

    public function store(HobbyRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(HobbyRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
