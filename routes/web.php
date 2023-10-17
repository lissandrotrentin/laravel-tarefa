<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TarefaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



route::post('/saveanexo', [TarefaController::class , 'mailanex'])->name('tarefas.mailanex');

route::delete('/tarefa/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

route::put('/tarefa/{id}', [TarefaController::class, 'update'])->name('tarefas.update');

route::get('/tarefa/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');

route::get('/tarefa/{id}', [TarefaController::class, 'show'])->name('tarefas.show'); // por tarefa/create antes se nao ele entende que o create e o id que e o valor que estamos passando nessa rota pela url

route::post('/tarefa', [TarefaController::class, 'store'])->name('tarefas.store');

route::get('/lista', [TarefaController::class, 'listagem'])->name('tarefas.listagem');

Route::get('/inicial', [SiteController::class, 'teste']);

Route::post('/login', [LoginController::class, 'loginstore'])->name('login.store');

Route::get('/login', [LoginController::class, 'loginindex'])->name('login.index');

Route::get('/cadastrar', [LoginController::class, 'cadastroindex'])->name('cadastro.index');

Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::post('/cadastro', [LoginController::class, 'cadastro'])->name(('cadastro'));

Route::get('/', [HomeController::class, 'index'])->name('home');
