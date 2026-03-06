<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $user->load('employer.jobs');

        $jobs = $user->employer
            ? $user->employer->jobs()->latest()->get()
            : collect();

        return view('profile.show', [
            'user' => $user,
            'jobs' => $jobs,
        ]);
    }
}
