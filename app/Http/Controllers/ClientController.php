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

    /**
     * @OA\Get(
     *     path="/buscarTodos",
     *     tags={"Clientes"},
     *     summary="Consulta de dados de todos os cliente.",
     *     description="Consulta de dados de todos os cliente.",
     *     @OA\Response(response="200", description="Retorna todos os clientes")
     * )
    */

    public function findAll(){
        $client = $this->clientService->findAll();
        return response()->json($client);
    }

    /**
     * @OA\Get(
     *     path="/cliente/{id}",
     *     operationId="findById",
     *     tags={"Clientes"},
     *     summary="Consulta de dados de um cliente.",
     *     description="Consulta de dados de um cliente.",
     * @OA\Parameter(name="id", in="path", description="Id do Cliente", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(response="200", description="Retorna o cliente do Id informado")
     * )
    */

    public function findById(int $id){
        $client = $this->clientService->findById($id);
        return response()->json($client);
    }

    /**
     * @OA\Post(
     *      path="/cliente",
     *      operationId="save",
     *      tags={"Clientes"},
     *      summary="Cadastro de novo cliente.",
     *      description="Cadastro de novo cliente.",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "phone", "cpf", "placa"},
     *           @OA\Property(property="name", type="string", format="string", example="Leandro Araujo"),
     *           @OA\Property(property="phone", type="string", format="string", example="+5598981055665"),
     *           @OA\Property(property="cpf", type="string", format="string", example="12345678900"),
     *           @OA\Property(property="placa", type="string", format="string", example="NXE4949"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Retorna o cliente cadastrado",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */

    public function save(Request $request){
        $client = $this->clientService->save($request->all());
        return response()->json($client, 201);
    }

    /**
     * @OA\Put(
     *     path="/cliente/{id}",
     *     operationId="update",
     *     tags={"Clientes"},
     *     summary="Edição de um cliente já existente.",
     *     description="Edição de um cliente já existente.",
     * @OA\Parameter(name="id", in="path", description="Id do Cliente", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     * @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *           required={"name", "phone", "cpf", "placa"},
     *           @OA\Property(property="name", type="string", format="string", example="Leandro Araujo"),
     *           @OA\Property(property="phone", type="string", format="string", example="+5598981055665"),
     *           @OA\Property(property="cpf", type="string", format="string", example="12345678900"),
     *           @OA\Property(property="placa", type="string", format="string", example="NXE4949"),
     *        ),
     *     ),
     *     @OA\Response(
     *      response="200", description="Retorna dados atualizados do cliente",
     *          @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *      )
     * )
    */

    public function update(int $id, Request $request){
        $client = $this->clientService->update($id, $request->all());
        return response()->json($client);
    }

    /**
     * @OA\Delete(
     *     path="/cliente/{id}",
     *     operationId="delete",
     *     tags={"Clientes"},
     *     summary="Remoção de um cliente existente.",
     *     description="Remoção de um cliente existente.",
     * @OA\Parameter(name="id", in="path", description="Id do Cliente", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(response="200", description="Retorna true para cliente deletado com sucesso")
     * )
    */

    public function delete(int $id){
        try {
            $registroDeletado = $this->clientService->delete($id);
        } catch (\Exception $exception) {
            return $exception;
        }

        return response()->json($registroDeletado);
    }

    /**
     * @OA\Get(
     *     path="/consulta/final-placa/{number}",
     *     operationId="findByPlaca",
     *     tags={"Clientes"},
     *     summary="Consulta de todos os clientes cadastrados na base, onde o último número da placa do carro é igual ao informado.",
     *     description="Consulta de todos os clientes cadastrados na base, onde o último número da placa do carro é igual ao informado.",
     * @OA\Parameter(name="number", in="path", description="Último número da placa do carro do Cliente", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(response="200", description="Retorna dados do cliente pesquisado pelo final da placa")
     * )
    */

    public function findByPlaca(string $number){
        $client = $this->clientService->findByPlaca($number);
        return response()->json($client);
    }
}