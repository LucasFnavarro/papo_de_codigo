<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// POR HORA MANTER ASSIM PARA NÃO DAR ERRO NO REDIRECIONAMENTO APÓS O LOGIN.
Route::get('/', [MainController::class, 'home'])->name('home');



Route::middleware(['guest'])->group(function(){
    // Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [AuthController::class, 'store_user'])->name('register');
});



Route::middleware(['auth'])->group(function(){




    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
