<?php


namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Repositories\ClientRepository;


class ClientService
{
    private $clientRepository;

    public function __construct(ClientRepository $repository)
    {
        $this->clientRepository = $repository;
    }

    public function findAll(){
        try {
            if ($this->clientRepository->findAll() == null) {
                return [
                    'message' => "Nenhum registro encontrado!"
                ];
            }
            return $this->clientRepository->findAll();

        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function findById(int $id){
        try {
            if ($this->clientRepository->findById($id) == null) {
                return [
                    'message' => "Cliente não encontrado para o Id -> " . $id
                ];
            }
            return $this->clientRepository->findById($id);

        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function save(array $array){
        try {
            return $this->clientRepository->save($array);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(int $id, array $array){
        try {
            $client = $this->findById($id);
            if (is_array($client)) {
                return [
                    'message' => "Nenhum registro encontrado para o Id -> " . $id
                ];
            }
            $this->clientRepository->update($client, $array);
            return $client;

        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(int $id): bool
    {
        $client = $this->findById($id);
        if (is_array($client)) {
            return [
                'message' => "Nenhum registro encontrado para o Id -> " . $id
            ];
        }
        return $this->clientRepository->delete($id);
    }







    // public function create($client){
    //     $newClient = Client::where('cpf', $client->cpf)->first();

    //     $client->name = 'Leandro';
    //     $client->phone = '981055665';
    //     $client->cpf = '02748988370';
    //     $client->placa = 'nxe4949';

    //     if($newClient !== null){

    //         $this->edit($newClient->id);

    //     } else {
    //         $newClient = new Client();

    //         $newClient->name = $client->name;
    //         $newClient->phone = $client->phone;
    //         $newClient->cpf = $client->cpf;
    //         $newClient->placa = $client->placa;

    //         $newClient->save();
    //     }
    // }

    // public function edit($id){
    //     $client = Client::where('id', $id)->first();

    //     if($client !== null){

    //         $client->save();

    //     } else {
            
    //     }
    // }

    // public function delete($id){
    //     $client = Client::where('id', $id)->first();

    //     if($client !== null){
    //         $client->delete();
            
    //         return response()->json([
    //             'message' => "Cliente excluido com sucesso!"
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => "Cliente inexistente na base de dados ou excluido anteriormente"
    //         ]);
    //     }
    // }

    // public function clientConsult($id){
    //     $client = Client::where('id', $id)->first();

    //     if($client !== null){
    //         return $client;
    //     } else {
    //         return response()->json([
    //             'message' => "Cliente inexistente na base de dados"
    //         ]);
    //     }
    // }

    // public function placaConsult($number){
    //     return Client::where('placa', 'like', '%'.$number.'%')->get();
    // }











    //     foreach($zipCodes as $zipCode){

    //         $zipCode = filter_var($zipCode, FILTER_SANITIZE_NUMBER_INT);

    //         $response = Http::get("https://api.postmon.com.br/v1/cep/$zipCode");

    //         if(!$response->ok()){
    //             return response("CEP $zipCode Inexistente", 404);
    //         }

    //         $address = Zipcode::where('cep', $zipCode)->first();

    //         if($address !== null){

    //             $this->update($address);

    //         } else {
    //             $addresses = new Zipcode();
    
    //             $addresses->bairro = $response['bairro'];
    //             $addresses->cidade = $response['cidade'];
    //             $addresses->logradouro = $response['logradouro'];
    //             $addresses->cep = $response['cep'];
    //             $addresses->estado = $response['estado'];
    
    //             $addresses->save();
    //         }
    //     }

    //     return true;
    // }

    

    // public function update($address){
    //     $address->save();
    // }

    // public function deleteOne($zipCode){
    //     $address = ZipCode::where('cep', $zipCode)->first();

    //     if($address !== null){
    //         $address->delete();
    //     } else {
    //         return "Cep inexistente na base de dados ou excluido anteriormente";
    //     }

    // }

}
