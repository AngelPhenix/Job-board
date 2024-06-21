<?php

use App\Models\Fish;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Spot;

Route::get('/', function () {
   return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(3);

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
    return view('fish', [
        'fishs' => Fish::all()
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