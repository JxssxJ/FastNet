<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;

Route::get('/', [PlanoController::class, 'index']);
Route::get('/planos/create', [PlanoController::class, 'create']);

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/produtos', function () {

    $busca = request('search');

    return view('produtos', ['busca' => $busca]);
});

Route::get('/produtos2/{id?}', function ($id = 1) {
    return view('produto', ['id' => $id]);
});

