<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesSaudeController;
use App\Http\Controllers\VacinasController;
use App\Http\Controllers\ColaboradoresController;

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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', function() {
    return view('home');
})->name('home')->middleware('auth');

/* :: ROTAS RELACIONADAS A UNIDADES DE SAÚDE :: */
/* :: ROTAS RELACIONADAS A UNIDADES DE SAÚDE :: */
Route::get('/unidades_saude', [UnidadesSaudeController::class, 'index'])->name('unidades.listar');
Route::get('/unidades_saude/cadastrar', [UnidadesSaudeController::class, 'create'])->name('unidades.cadastrar');
Route::get('/unidades_saude/{unidade}', [UnidadesSaudeController::class, 'show'])->name('unidades.detalhes');
Route::post('/unidades_saude/cadastrar', [UnidadesSaudeController::class, 'store'])->name('unidades.cadastrar_unidade');
Route::get('/unidades_saude/editar/{unidade}', [UnidadesSaudeController::class, 'edit'])->name('unidades.editar');
Route::put('/unidades_saude/editar/{unidade}', [UnidadesSaudeController::class, 'update'])->name('unidades.editar_unidade');
Route::delete('/unidades_saude/deletar/{unidade}', [UnidadesSaudeController::class, 'destroy'])->name('unidades.deletar');

/* :: ROTAS RELACIONADAS AS VACINAS :: */
Route::get('/vacinas', [VacinasController::class, 'index'])->name('vacinas.listar');
Route::get('/vacinas/cadastrar', [VacinasController::class, 'create'])->name('vacinas.cadastrar');
Route::get('/vacinas/{vacina}', [VacinasController::class, 'show'])->name('vacinas.detalhes');
Route::post('/vacinas/cadastrar', [VacinasController::class, 'store'])->name('vacinas.cadastrar_vacina');
Route::get('/vacinas/editar/{vacina}', [VacinasController::class, 'edit'])->name('vacinas.editar');
Route::put('/vacinas/editar/{vacina}', [VacinasController::class, 'update'])->name('vacinas.editar_vacina');
Route::delete('/vacinas/deletar/{vacina}', [VacinasController::class, 'destroy'])->name('vacinas.deletar');

/* :: ROTAS RELACIONADAS AOS COLABORADORES :: */
Route::get('/colaboradores', [ColaboradoresController::class, 'index'])->name('colaboradores.listar');
Route::get('/colaboradores/cadastrar', [ColaboradoresController::class, 'create'])->name('colaboradores.cadastrar');
Route::get('/colaboradores/{vacina}', [ColaboradoresController::class, 'show'])->name('colaboradores.detalhes');
Route::post('/colaboradores/cadastrar', [ColaboradoresController::class, 'store'])->name('colaboradores.cadastrar_colaborador');
Route::get('/colaboradores/editar/{vacina}', [ColaboradoresController::class, 'edit'])->name('colaboradores.editar');
Route::put('/colaboradores/editar/{vacina}', [ColaboradoresController::class, 'update'])->name('colaboradores.editar_colaborador');
Route::delete('/colaboradores/deletar/{vacina}', [ColaboradoresController::class, 'destroy'])->name('colaboradores.deletar');

/* :: ROTAS RELACIONADAS AOS USUÁRIOS :: */
Route::get('/usuarios', [App\Http\Controllers\UsersController::class, 'index'])->name('usuarios.listar');
Route::get('/usuarios/id', [App\Http\Controllers\UsersController::class, 'show'])->name('usuarios.detalhes');
Route::get('/usuarios/cadastrar', [App\Http\Controllers\UsersController::class, 'create'])->name('usuarios.cadastrar');
Route::get('/usuarios/editar/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('usuarios.editar');
Route::get('/usuarios/deletar', [App\Http\Controllers\UsersController::class, 'destroy'])->name('usuarios.deletar');
