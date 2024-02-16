<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// dashboard routes
Route::get('/', [DashboardController::class , 'index'])->name('dashboard');


// idea routes
Route::post('/ideas', [IdeaController::class , 'store'])->name('ideas.store');

Route::get('/ideas/{idea}', [IdeaController::class , 'show'])->name('ideas.show')->middleware('auth');

Route::get('/ideas/{idea}/edit', [IdeaController::class , 'edit'])->name('ideas.edit')->middleware('auth');

Route::put('/ideas/{idea}', [IdeaController::class , 'update'])->name('ideas.update')->middleware('auth');

Route::delete('/ideas/{idea}', [IdeaController::class , 'destroy'])->name('ideas.destroy')->middleware('auth');

// commentes
Route::post('/ideas/{idea}/comments',[CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');

// REGISTER 
Route::get('/register', [AuthController::class , 'index'])->name('register');

Route::post('/register', [AuthController::class , 'store']);

//LOGIN
Route::get('/login', [AuthController::class , 'login'])->name('login');

Route::post('/login', [AuthController::class , 'authenticate']);

Route::post('/logout', [AuthController::class , 'logout'])->name('logout');


Route::get('/terms',function(){
    return view('terms');
});
