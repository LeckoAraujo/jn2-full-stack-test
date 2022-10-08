<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ClientController::class, 'findAll'])->name('.findAll');
Route::post('/cliente', [ClientController::class, 'save'])->name('.save');
Route::put('/cliente/{id}', [ClientController::class, 'update'])->name('.update');
Route::delete('/cliente/{id}', [ClientController::class, 'delete'])->name('.delete');
Route::get('/cliente/{id}', [ClientController::class, 'findById'])->name('.findById');
Route::get('/consulta/final-placa/{number}', [ClientController::class, 'findByPlaca'])->name('.findByPlaca');