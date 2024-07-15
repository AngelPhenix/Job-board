<?php

use App\Http\Controllers\FishController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SpotController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');
Route::view('/contact', 'contact');



Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit,job']);
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware(['auth', 'can:edit,job']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware(['auth', 'can:edit,job']);



Route::controller(FishController::class)->group(function() {
    Route::get('/fish', 'index');
    Route::get('/fish/create', 'create');
    Route::post('/fish', 'store');
});

Route::controller(SpotController::class)->group(function() {
    Route::get('/spots', 'index');
    Route::get('/spot/create', 'create');
    Route::get('/spot/{spot}', 'show');
    Route::post('/spot', 'store');
});


// Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);