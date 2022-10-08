<?php


namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Client;


class ClientService
{

    public function list(){
        return Client::all();
    }

    public function create($client){

    }

    public function edit($id){}

    public function delete($id){}

    public function clientConsult($id){}

    public function placaConsult($number){
        return Client::where('placa', 'like', '%'.$number.'%')->get();
    }

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
