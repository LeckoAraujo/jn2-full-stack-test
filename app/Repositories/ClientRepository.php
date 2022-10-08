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

    public function save(array $array){
        $newClient = Client::where('cpf', $array['cpf'])->first();

        if($newClient !== null){

            return "Esse CPF já foi cadastrado anteriormente na base de datos";

        } else {
            $newClient = new Client();

            $newClient->name = $array['name'];
            $newClient->phone = $array['phone'];
            $newClient->cpf = $array['cpf'];
            $newClient->placa = $array['placa'];

            return $newClient->save();
        }
    }

}