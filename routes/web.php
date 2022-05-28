<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empresas', [App\Http\Controllers\EmpresasController::class, 'index'])->name('empresas');
Route::get('/empresas/painel/{id}', [App\Http\Controllers\EmpresasController::class, 'painel'])->name('empresas.painel');
Route::get('/empresas/painel/{id}/orcamento/{idserv}', [App\Http\Controllers\EmpresasController::class, 'orcamento'])->name('empresas.servico');
Route::get('/empresas/painel/{id}/servico/{idserv}/editar-informacoes', [App\Http\Controllers\EmpresasController::class, 'editar'])->name('empresas.servico.edit');
