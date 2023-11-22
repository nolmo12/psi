<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view("games.index", [
            'games' => Game::all()
        ]);
    }
    //Show single tournament
    public function show($id)
    {
        return view("games.show", [
            'game' => Game::find($id),
            'tournaments' => Tournament::where('game_id', '=', $id)->get()
        ]);
    }
}
