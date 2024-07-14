<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\Spot;

class FishermanController extends Controller
{
    public function fish_index()
    {
        $fish = Fish::with('spots')->get();

        return view('fisherman.fish', [
            'fishs' => $fish
        ]);
    }

    public function fish_create()
    {
        return view('fisherman.fish_create');
    }

    public function fish_store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'level' => ['required', 'integer']
        ]);

        Fish::create($attributes);

        return redirect('/');
    }

    public function spot_index()
    {
        return view('fisherman.spots', [
            'spots' => Spot::all()
        ]);
    }

    public function spot_show(Spot $spot)
    {
        return view('fisherman.spot', [
            'spot' => $spot
        ]);
    }
}
