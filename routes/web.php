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

    return view('jobs.index', [
            'jobs' => $jobs
        ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function() {
    // validation...

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
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