<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    //Show all tournaments
    public function index()
    {
        return Tournament::all();
    }
    //Show single tournament
    public function show($id)
    {
        return view("tournament", [
            'tournament' => Tournament::find($id)
        ]);
    }
}
