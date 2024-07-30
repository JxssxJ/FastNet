<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PlanoTVController;
use App\Http\Controllers\PessoaController;


/*
Route::resource('plano', PlanoController::class);
*/
Route::get('/', function () {
    return view('welcome');
});


Route::resource('plano', PlanoController::class);
Route::post('/plano/search', [PlanoController::class, "search"])->name('plano.search');

Route::resource('produto', ProdutoController::class);
Route::post('/produto/search', [ProdutoController::class, "search"])->name('produto.search');

Route::resource('planotv', PlanoTVController::class);
Route::post('/planotv/search', [PlanoTVController::class, "search"])->name('planotv.search');

Route::post('/pessoa/search', [PessoaController::class, "search"])->name('pessoa.search');
Route::get('/pessoa/chart/',
    [PessoaController::class, "chart"])->name('pessoa.chart');
Route::get('/pessoa/report/',
    [PessoaController::class, "report"])->name('pessoa.report');
Route::resource('pessoa', PessoaController::class);

