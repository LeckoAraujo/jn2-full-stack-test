<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Client;

class ClientRepository
{

    private $clientModel;

    public function __construct(Client $model)
    {
        $this->clientModel = $model;
    }

    public function findAll(){
        return $this->clientModel::all();
    }

}