<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PlanoTVController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PromocaoController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/plano/report',
    [PlanoController::class, "report"])->name('plano.report');
    Route::resource('plano', PlanoController::class);
    Route::post('/plano/search', [PlanoController::class, "search"])->name('plano.search');

    Route::get('/produto/report',
    [ProdutoController::class, "report"])->name('produto.report');
    Route::resource('produto', ProdutoController::class);
    Route::post('/produto/search', [ProdutoController::class, "search"])->name('produto.search');

    Route::resource('planotv', PlanoTVController::class);
    Route::post('/planotv/search', [PlanoTVController::class, "search"])->name('planotv.search');

    Route::post('/pessoa/search', [PessoaController::class, "search"])->name('pessoa.search');
    Route::get(
        '/pessoa/chart/',
        [PessoaController::class, "chart"]
    )->name('pessoa.chart');
    Route::get(
        '/pessoa/report/',
        [PessoaController::class, "report"]
    )->name('pessoa.report');
    Route::resource('pessoa', PessoaController::class);

    Route::post('/promocao/search', [PromocaoController::class, "search"])->name('promocao.search');
    Route::get(
        '/promocao/chart/',
        [PromocaoController::class, "chart"]
    )->name('promocao.chart');
    Route::get(
        '/promocao/report/',
        [PromocaoController::class, "report"]
    )->name('promocao.report');
    Route::resource('promocao', PromocaoController::class);
});

require __DIR__ . '/auth.php';
