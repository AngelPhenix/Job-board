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
