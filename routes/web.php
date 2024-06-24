<?php

use App\Models\Fish;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Spot;

Route::get('/', function () {
   return view('home');
});


// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(8);

    return view('jobs.index', [
            'jobs' => $jobs
        ]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function() {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

/*     $job->title = request('title');
    $job->salary = request('salary');
    $job->save(); */

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
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