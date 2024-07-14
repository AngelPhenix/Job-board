<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fisherman.spots', [
            'spots' => Spot::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fisherman.spot_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'region' => ['required'],
            'name' => ['required'],
            'level' => ['required', 'integer']
        ]);

        Spot::create($attributes);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spot $spot)
    {
        return view('fisherman.spot', [
            'spot' => $spot
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spot $spot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spot $spot)
    {
        //
    }
}
