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
        return view("tournament", [
            'tournament' => Tournament::all()
        ]);
    }
    //Show single tournament
    public function show($id)
    {
        return view("tournaments.index", [
            'tournament' => Tournament::find($id)
        ]);
    }

    public function create($data)
    {
        return view('tournaments.create',[
            'games' => Game::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'game_id' => 'required',
            'name'=> 'bail|required|unique|max:64',
            'description' => 'max:255',
        });

        $tournament = new Tournament();
        $tournament->game_id = $validated['game_id'];
        $tournament->name = $validated['name'];
        $tournament->description = $validated['description'];
        $tournament->save();
        return redirect()->route('add-tournament-form')->with('status','Tournament has been added!');

    }
}
