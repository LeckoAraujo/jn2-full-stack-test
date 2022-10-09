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

### 1.Baixando o projeto

Abra um terminal no diretório onde o projeto ficará armazenado e execute o comando

~~~ Git
git clone https://github.com/LeckoAraujo/jn2-full-stack-test.git
~~~

### 2.Atualando dependencias

~~~ Composer
compose update
~~~

### 3.Configurando o .env do Laravel

~~~ Artisan
cp .env.example .env
~~~

#### 3.1.Configurando conexão com o banco de dados

Informação de configuração da conexão com o banco que devem ser atualizadas no .env

~~~
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=jn2_test
DB_USERNAME=postgres
DB_PASSWORD=postgres
~~~

#### 3.2.Definindo uma nova chave no seu arquivo .env

~~~ Artisan
php artisan key:generate
~~~

### 4.Levantando o container docker

Com o terminal ainda aberto na raiz do projeto execute o comando para levantar o container

~~~ Docker
docker compose up
~~~

### 5.Executando as Migrations

~~~ Artisan
php artisan migrate
~~~

### 6.Rodando a aplicação Laravel

~~~ Artisan
php artisan serve
~~~

### 7.Documentação da API com Swagger

Com o projeto em execução acesse o link

<a href="http://127.0.0.1:8000/api/documentation" target="_blank">Documentação API Swagger</a>

para ver todos os endpois e testalos

### Testanto a API

Você pode testar o projeto pelo link <a href="http://127.0.0.1:8000/api/documentation" target="_blank">Documentação API Swagger</a> ou utilizando algum software como o <a href="https://insomnia.rest/download" target="_blank">Insomnia</a> ou <a href="https://www.postman.com/downloads/" target="_blank">Postman</a>

## Sobre o Projeto

### Arquitetura