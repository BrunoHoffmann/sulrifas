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
    // Login
    Route::get("/", "admin\AuthController@showLoginForm")->name('admin.login');
    Route::post("login", "admin\AuthController@login")->name('login.do');

    // rotas protegidas
    Route::group(['middleware' => ['auth']], function() {

        // Dashboard HOME
        Route::get('/home', 'admin\AuthController@home')->name('admin.home');

        // Usuários
        Route::prefix('usuarios')->group(function() {
            Route::get('/', 'admin\UserController@index')->name('users.index');
            Route::get('/create', 'admin\UserController@create')->name('users.create');
            Route::post('/store', 'admin\UserController@store')->name('users.store');
            Route::get('/edit/{id}', 'admin\UserController@edit')->name('users.edit');
            Route::put('/update/{id}', 'admin\UserController@update')->name('users.update');
            Route::get('/destroy/{id}', 'admin\UserController@destroy')->name('users.destroy');
        });

        // Sorteios
        Route::prefix('sorteios')->group(function() {
            Route::get('/', 'admin\SorteiosController@index')->name('sorteios.index');
            Route::get('/create', 'admin\SorteiosController@create')->name('sorteios.create');
            Route::post('/store', 'admin\SorteiosController@store')->name('sorteios.store');
            Route::get('/edit/{id}', 'admin\SorteiosController@edit')->name('sorteios.edit');
            Route::get('/delete/{id}/{name}', 'admin\SorteiosController@deleteImg')->name('sorteios.delete.img');
            Route::put('/update/{id}', 'admin\SorteiosController@update')->name('sorteios.update');
            Route::get('/destroy/{id}', 'admin\SorteiosController@destroy')->name('sorteios.destroy');
        });

        // Reserva
        Route::prefix('cotas')->group(function() {
            Route::get('/{id_sorteio}', 'admin\CotasController@index')->name('cotas.index');
            Route::get('/livre/{id_sorteio}/{id}', 'admin\CotasController@livre')->name('cotas.livre');
            Route::get('/reservar/{id_sorteio}/{id}', 'admin\CotasController@createReserva')->name('cotas.reservar');
            Route::post('/reservar/{id_sorteio}/{id}', 'admin\CotasController@storeReserva')->name('cotas.store.reserva');
            Route::get('/pago/{id_sorteio}/{id}', 'admin\CotasController@pago')->name('cotas.pago');
            Route::get('/ganhador/{id_sorteio}/{id}', 'admin\CotasController@winner')->name('cotas.ganhador');
        });

        // Banco
        Route::prefix('bancos')->group(function() {
            Route::get('/', 'admin\BancoController@index')->name('banks.index');
            Route::get('/create', 'admin\BancoController@create')->name('banks.create');
            Route::post('/store', 'admin\BancoController@store')->name('banks.store');
            Route::get('/edit/{id}', 'admin\BancoController@edit')->name('banks.edit');
            Route::put('/update/{id}', 'admin\BancoController@update')->name('banks.update');
            Route::get('/destroy/{id}', 'admin\BancoController@destroy')->name('banks.destroy');
        });

        // Intituições
        Route::prefix('instituicoes')->group(function() {
            Route::get('/', 'admin\InstituicoesController@index')->name('instituicoes.index');
            Route::get('/create', 'admin\InstituicoesController@create')->name('instituicoes.create');
            Route::post('/store', 'admin\InstituicoesController@store')->name('instituicoes.store');
            Route::get('/edit/{id}', 'admin\InstituicoesController@edit')->name('instituicoes.edit');
            Route::put('/update/{id}', 'admin\InstituicoesController@update')->name('instituicoes.update');
            Route::get('/destroy/{id}', 'admin\InstituicoesController@destroy')->name('instituicoes.destroy');
        });

        // Leads
        Route::prefix("leads")->group(function() {
            Route::get('/', 'admin\LeadsController@index')->name('leads.index');
            Route::get("/destroy/{id}", 'admin\LeadsController@destroy')->name('leads.destroy');

        });

    });


    // logout
    Route::get('/logout', 'admin\AuthController@logout')->name('admin.logout');
});

Route::fallback(function() {
    return 'Desculpe, mas essa rota não foi encontrada :(';
});


