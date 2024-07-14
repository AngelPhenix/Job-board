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
        $spots = Spot::all();

        return view('fisherman.fish_create', [
            'spots' => $spots
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'level' => ['required', 'integer'],
            'spot_id' => ['required', 'exists:spots,id']
        ]);

        $fish = Fish::create([
            'name' => $attributes['name'],
            'level' => $attributes['level']
        ]);

        $fish->spots()->attach($attributes['spot_id']);

        return redirect('/');
    }
}
