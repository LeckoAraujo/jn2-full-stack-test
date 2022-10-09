<?php


namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Repositories\ClientRepository;
use App\Exceptions\ErrorDefault;


class ClientService
{
    private $clientRepository;
    private $dto;

    public function __construct(ClientRepository $repository)
    {
        $this->clientRepository = $repository;
        $this->dto = new ErrorDefault;
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

    public function findByCpf(string $cpf){
        try {
            return $this->clientRepository->findByCpf($cpf);
        } catch (\Exception $exception) {
            return $this->dto->errorDefault($exception->getMessage());
        }
    }

    public function save(array $array){
        try {
            if($this->findByCpf($array['cpf']) == null){
                return $this->clientRepository->save($array);
            } else {
                return [
                    'message' => "Esse CPF já foi cadastrado anteriormente na base de datos"
                ];
            }
        } catch (\Exception $exception) {
            return $this->dto->errorDefault($exception->getMessage());
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

    public function findByPlaca(string $number){
        try {
            if ($this->clientRepository->findByPlaca($number) == null) {
                return [
                    'message' => "Placa não encontrada para o Final -> " . $number
                ];
            }
            return $this->clientRepository->findByPlaca($number);

        } catch (\Exception $exception) {
            return $exception;
        }
    }
}