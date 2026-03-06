<?php

namespace App\Http\Controllers;

use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        $jobCount = Job::count();
        $recentJobs = Job::with('employer')->latest()->take(3)->get();

        return view('home', [
            'jobCount' => $jobCount,
            'recentJobs' => $recentJobs,
        ]);
    }
}
