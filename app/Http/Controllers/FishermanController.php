<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\Spot;

class FishermanController extends Controller
{
    public function index()
    {
        $fish = Fish::with('spots')->get();

        return view('fisherman.fish', [
            'fishs' => $fish
        ]);
    }

    public function create()
    {
        return view('fisherman.fish_create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'level' => ['required', 'integer']
        ]);

        Fish::create($attributes);

        return redirect('/');
    }
}
