<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixtureController extends Controller
{
    public function index()
    {
        return Fixture::all();
    }

    public function show($id)
    {
        $fixture = DB::table('fixtures')
        ->join('tournaments', 'fixtures.tournament_id', '=', 'tournaments.id')
        ->join('teams as t1', 'fixtures.home_team_id', '=', 't1.id')
        ->join('teams as t2', 'fixtures.away_team_id', '=', 't2.id')
        ->where('fixtures.id', $id)
        ->select('fixtures.*', 'tournaments.name as tournament_name', 't1.name as home_team', 't2.name as away_team')
        ->first();
        //$tournament = DB::table('tournaments')->find($fixture['tournament_id']);
        //$home_team = DB::table('teams')->find($fixture['home_team_id']);
        //$away_team = DB::table('teams')->find($fixture['away_team_id']);

        //$data = $fixture;

        return $fixture;
    }

    public function insert()
    {
        return view('fixtures.insert');
    }

    public function store(Request $request)
    {
        $fixture = new Fixture;
        $fixture->tournament_id = $request->tournament_id;
        $fixture->home_team_id = $request->home_team_id;
        $fixture->away_team_id = $request->away_team_id;
        $fixture->home_team_score = $request->home_team_score;
        $fixture->away_team_score = $request->away_team_score;
        $fixture->round_number = $request->round_number;
        $fixture->save();
        return redirect('add-fixture')->with('status', 'Match has been added');
    }
}
