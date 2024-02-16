<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// REGISTER 

Route::group(['prefix' => '/register'],function(){

    Route::get('', [AuthController::class , 'index'])->name('register');
    
    Route::post('', [AuthController::class , 'store']);
    
});

//LOGIN
Route::group(['prefix' => '/login'],function(){
    Route::get('', [AuthController::class , 'login'])->name('login');

    Route::post('', [AuthController::class , 'authenticate']);
});

Route::post('/logout', [AuthController::class , 'logout'])->name('logout');