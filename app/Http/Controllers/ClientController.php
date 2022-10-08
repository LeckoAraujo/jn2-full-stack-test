<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\ClientService;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $service)
    {
        $this->clientService = $service;
    }

    public function findAll(){
        $client = $this->clientService->findAll();
        return response()->json($client);
    }

    public function save(Request $request){
        $client = $this->clientService->save($request->all());
        return response()->json($client);
    }

    public function update(){}

    public function delete(){}

    public function findById(){}

    public function findByPlaca(){}
}
