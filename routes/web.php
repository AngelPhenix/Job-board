<?php

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


Route::get('/fish', function () {
    $fish = Fish::with('spots')->get();

    return view('fisherman/fish', [
        'fishs' => $fish
    ]);
});

Route::get('/spots', function () {

    return view('fisherman/spots', [
        'spots' => Spot::all()
    ]);
});

Route::get('/spot/{id}', function ($id) {
    $spot = Spot::find($id);
    
    return view('fisherman/spot', [
        'spot' => $spot
    ]);
});