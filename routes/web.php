<?php

use App\Http\Controllers\FishermanController;
use App\Http\Controllers\JobController;
use App\Models\Fish;
use Illuminate\Support\Facades\Route;
use App\Models\Spot;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

/* Route::controller(JobController::class)->group(function() {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
}); */

Route::controller(FishermanController::class)->group(function() {
    Route::get('/fish', 'fish_index');
    Route::get('/spots', 'spot_index');
    Route::get('/spot/{spot}', 'spot_show');
});