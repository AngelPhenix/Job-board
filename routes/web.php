<?php

use App\Models\Fish;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Spot;

Route::get('/', function () {
   return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(3);

    return view('jobs', [
            'jobs' => $jobs
        ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/fish', function () {
    $fish = Fish::with('spots')->get();

    return view('fish', [
        'fishs' => $fish
    ]);
});

Route::get('/spots', function () {

    return view('spots', [
        'spots' => Spot::all()
    ]);
});

Route::get('/spot/{id}', function ($id) {
    $spot = Spot::find($id);
    return view('spot', ['spot' => $spot]);
});