# Desafio Técnico JN2 Ecommerce

O nosso desafio consiste na criação de um sistema de controle de clientes e suas respectivas placas de carro.

### Você precisará construir uma base de dados com os seguintes campos:

* ID
* Nome
* Telefone
* CPF
* Placa do Carro

### Para o gerenciamento dessa base, você construirá uma API REST contendo os seguintes endpoints:

Método   | Endpoint                       | Descrição
-------- | -----------------------------  | ----------
GET      | /buscarTodos                   | Consulta de dados de todos os cliente.
POST     | /cliente                       | Cadastro de novo cliente.
PUT      | /cliente/{id}                  | Edição de um cliente já existente.
DELETE   | /cliente/{id}                  | Remoção de um cliente existente.
GET      | 	/cliente/{id}                 | Consulta de dados de um cliente.
GET      | /consulta/final-placa/{numero} | Consulta de todos os clientes cadastrados na base, onde o último número da placa do carro é igual ao informado.

### Regras

* Você deve construir o seu ambiente utilizando o docker e docker-compose (você pode utilizar uma receita de ambiente pronta, encontrada na internet);
* Você deve utilizar um framework PHP de sua escolha;
* Você será avaliado pela lógica e leitura do seu código, seguindo os princípios SOLID e PSR.

## Configurando e Instalando o Hambiente

Abra um terminal no diretório onde o projeto ficará armazenado e execute o comando

~~~ Git
git clone https://github.com/LeckoAraujo/jn2-full-stack-test.git
~~~