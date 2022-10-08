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

    public function list(){
        return $this->clientService->list();
    }

    public function create($client){
        return $this->clientService->create($client);
    }

    public function edit($id){
        return $this->clientService->edit($id);
    }

    public function delete($id){
        return $this->clientService->delete($id);
    }

    public function clientConsult($id){
        return $this->clientService->clientConsult($id);
    }

    public function placaConsult($number){
        return $this->clientService->placaConsult($number);
    }
}
