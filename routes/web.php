<?php

use App\Models\Fish;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Metier;
use App\Models\Spot;

Route::get('/', function () {
   return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
            'jobs' => Job::all()
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
    return view('fish', [
        'fishs' => Fish::all()
    ]);
});

Route::get('/spot/{id}', function ($id) {
    $spot = Spot::find($id);
    return view('spot', ['spot' => $spot]);
});