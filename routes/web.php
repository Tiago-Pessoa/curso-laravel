<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EventController;

//exibe a página inicial do aplicativo.
Route::get('/', [EventController::class, 'index']);

//exibe um formulário para criar um novo evento
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

//exibe informações sobre um evento específico com base em seu ID
Route::get('/events/{id}', [EventController::class, 'show']);

//cria um novo evento com base nos dados enviados por um formulário de criação
Route::post('/events', [EventController::class, 'store']);

//exclui um evento com base em seu ID
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth')->name('events.destroy');

// exibe um formulário para editar um evento existente com base em seu ID
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');

//atualiza um evento existente com base nos dados enviados por um formulário de edição
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

//verifica se já existe um email cadastrado na tentativa de cadastrar um novo usuário
Route::get('/check-user/{email}', [EventController::class, 'checkUser']);

//exibe uma lista de eventos existentes
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

//permite que um usuário participe de um evento existente com base em seu ID
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

//permite que um usuário deixe de participar de um evento existente com base em seu ID
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
