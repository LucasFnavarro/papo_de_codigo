<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){

    Route::get('/', [MainController::class, 'home'])->name('home');

});
