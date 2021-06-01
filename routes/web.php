<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AppController;

//Petizione e lista applicazioni
Route::get('/itsprodigy', [AppController::class, 'index']);

//Filtro ricerca applicazioni
Route::get('/search', [AppController::class, 'search']);


//Mostrare dettglio applicazione
Route::get('/show/{id}', [AppController::class, 'show']);
