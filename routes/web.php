<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::get("/sorteios", "SorteiosController@index")->name('sorteios');
Route::get("/instituicoes", "InstituicoesController@index")->name("instituicoes");
Route::get("/faleconosco", "FaleConoscoController@index")->name('faleconosco');

Route::prefix('dashboard')->group(function() {
    Route::get('/', 'Admin\HomeController@index')->name('admin');
    Route::get('/sair', 'Admin\HomeController@logout')->name('logout');
});

