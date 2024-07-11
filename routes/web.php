<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return redirect()->route('pessoa.create');
});

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/autenticacao', [LoginController::class, 'autenticacao'])->name('login.autenticacao');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

 // Usuarios/Clientes
 Route::group(['prefix' => '/pessoa', 'as' => 'pessoa.'], function() {
    Route::get('/create', [PessoaController::class, 'create'])->name('create');
    Route::post('/store', [PessoaController::class, 'store'])->name('store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');

    Route::get('/listagem-cadastros', [PessoaController::class, 'index'])->name('listar.pessoas');
});
