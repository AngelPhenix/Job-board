<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(8);

        return view('jobs.index', [
                'jobs' => $jobs
            ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'description' => ['required', 'min:20'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'in:Full-time,Part-time,Contract,Internship,Freelance'],
        ]);

        $user = auth()->user();
        $employer = $user->employer;

        if (!$employer) {
            $employer = Employer::create([
                'user_id' => $user->id,
                'name' => $user->name . ' ' . $user->last_name,
            ]);
        }

        $job = Job::create([
            'title' => request('title'),
            'salary' => trim(str_replace('€', '', request('salary', ''))),
            'description' => request('description'),
            'location' => request('location'),
            'employment_type' => request('employment_type'),
            'employer_id' => $employer->id,
        ]);

        Mail::to($job->employer->user)->queue(new \App\Mail\JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'description' => ['nullable', 'min:20'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'in:Full-time,Part-time,Contract,Internship,Freelance'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => trim(str_replace('€', '', request('salary', ''))),
            'description' => request('description'),
            'location' => request('location'),
            'employment_type' => request('employment_type'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
