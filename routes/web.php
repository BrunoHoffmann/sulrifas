<?php

use Illuminate\Support\Facades\Route;

// SITE
Route::get('/', 'HomeController@index')->name('home');

// Sorteios
Route::prefix('sorteios')->group(function() {
    Route::get("/", "SorteiosController@index")->name('sorteios');
    Route::get("/{tag}", "SorteiosController@index")->name('sorteios.search');
    Route::get('/show/{slug}', 'SorteiosController@show')->name('sorteios.show');
    Route::get('/show/{slug}/{filter}', 'SorteiosController@filter')->name('sorteios.filter');
    Route::post('/reservar/{slug}', 'SorteiosController@reservar')->name('sorteios.reservar');
});

// instituições
Route::get("/instituicoes", "InstituicoesController@index")->name("instituicoes");

// Fale Conosco
Route::get("/faleconosco", "FaleConoscoController@index")->name('faleconosco');

// ADMIN
Route::prefix('dashboard')->group(function() {
    // formulario de login
    Route::get("/", "Admin\AuthController@showLoginForm")->name('admin.login');
    Route::post("login", "Admin\AuthController@login")->name('login.do');

    // rotas protegidas
    Route::group(['middleware' => ['auth']], function() {

        // Dashboard HOME
        Route::get('/home', 'Admin\AuthController@home')->name('admin.home');

        // Usuários
        Route::prefix('usuarios')->group(function() {
            Route::get('/', 'Admin\UserController@index')->name('users.index');
            Route::get('/create', 'Admin\UserController@create')->name('users.create');
            Route::post('/store', 'Admin\UserController@store')->name('users.store');
            Route::get('/edit/{id}', 'Admin\UserController@edit')->name('users.edit');
            Route::put('/update/{id}', 'Admin\UserController@update')->name('users.update');
            Route::get('/destroy/{id}', 'Admin\UserController@destroy')->name('users.destroy');
        });

        // Sorteios
        Route::prefix('sorteios')->group(function() {
            Route::get('/', 'Admin\SorteiosController@index')->name('sorteios.index');
            Route::get('/create', 'Admin\SorteiosController@create')->name('sorteios.create');
            Route::post('/store', 'Admin\SorteiosController@store')->name('sorteios.store');
            Route::get('/edit/{id}', 'Admin\SorteiosController@edit')->name('sorteios.edit');
            Route::get('/delete/{id}/{name}', 'Admin\SorteiosController@deleteImg')->name('sorteios.delete.img');
            Route::put('/update/{id}', 'Admin\SorteiosController@update')->name('sorteios.update');
            Route::get('/destroy/{id}', 'Admin\SorteiosController@destroy')->name('sorteios.destroy');
        });

        // Reserva
        Route::prefix('cotas')->group(function() {
            Route::get('/{id_sorteio}', 'Admin\CotasController@index')->name('cotas.index');
            Route::get('/livre/{id_sorteio}/{id}', 'Admin\CotasController@livre')->name('cotas.livre');
            Route::get('/reservar/{id_sorteio}/{id}', 'Admin\CotasController@createReserva')->name('cotas.reservar');
            Route::post('/reservar/{id_sorteio}/{id}', 'Admin\CotasController@storeReserva')->name('cotas.store.reserva');
            Route::get('/pago/{id_sorteio}/{id}', 'Admin\CotasController@pago')->name('cotas.pago');
        });

        // Banco
        Route::prefix('bancos')->group(function() {
            Route::get('/', 'Admin\BancoController@index')->name('banks.index');
            Route::get('/create', 'Admin\BancoController@create')->name('banks.create');
            Route::post('/store', 'Admin\BancoController@store')->name('banks.store');
            Route::get('/edit/{id}', 'Admin\BancoController@edit')->name('banks.edit');
            Route::put('/update/{id}', 'Admin\BancoController@update')->name('banks.update');
            Route::get('/destroy/{id}', 'Admin\BancoController@destroy')->name('banks.destroy');
        });

        Route::get('/leads', 'Admin\LeadsController@index')->name('leads.index');

    });


    // logout
    Route::get('/logout', 'Admin\AuthController@logout')->name('admin.logout');
});


