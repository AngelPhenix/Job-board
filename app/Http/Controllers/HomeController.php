<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\Spot;

class HomeController extends Controller
{
    public function index()
    {
        // Query pour avoir le nombre de fish/spot dispo dans la BDD
        $fishNum = Fish::all()->count();
        $spotNum = Spot::all()->count();

        return view('home', [
            'fishNum' => $fishNum,
            'spotNum' => $spotNum
        ]);
    }
}
