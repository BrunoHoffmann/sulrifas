<?php

use Illuminate\Support\Facades\Route;

// site
Route::get('/', 'HomeController@index')->name('home');
Route::get("/sorteios", "SorteiosController@index")->name('sorteios');
Route::get("/instituicoes", "InstituicoesController@index")->name("instituicoes");
Route::get("/faleconosco", "FaleConoscoController@index")->name('faleconosco');

Route::prefix('dashboard')->group(function() {
    // formulario de login
    Route::get("/", "Admin\AuthController@showLoginForm")->name('admin.login');
    Route::post("login", "Admin\AuthController@login")->name('login.do');

    // rotas protegidas
    Route::group(['middleware' => ['auth']], function() {

        // Dashboard HOME
        Route::get('/home', 'Admin\AuthController@home')->name('admin.home');

        // Usuários
        Route::resource('users', 'Admin\UserController');
    });


    // logout
    Route::get('/logout', 'Admin\AuthController@logout')->name('admin.logout');
});


