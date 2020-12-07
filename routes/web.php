<?php

use App\Http\Controllers\CasaCategoriaController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\ImobiliariaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\LocadorController;
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
Route::get('/',IndexController::class)->name('index');
Route::resource('casacategorias', CasaCategoriaController::class);
Route::resource('casas', CasaController::class);
Route::resource('imobiliarias', ImobiliariaController::class);
Route::resource('locadores', LocadorController::class);
Route::resource('locacoes', LocacaoController::class);