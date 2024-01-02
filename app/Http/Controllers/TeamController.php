<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    private static function getGamesWon($team)
    {
        return $team;
    }
    public function index()
    {
        return view("teams.index", [
            'teams' => Team::all()
        ]);
    }
    public function ranking()
    {
        $team = DB::table('teams')
            ->select(DB::raw('sum(tournament_winners.team_id) as "place", teams.name as team_name'))
            ->leftJoin('tournament_winners', 'teams.id', '=' ,'tournament_winners.team_id')
            ->groupBy('teams.id')
            ->orderBy('place')
            ->get();
        
        $data = [
            $team,
        ];
        return $data;
    }

    public function statistic($id)
    {
        $gamesPlayed = 0;
        $gamesWon = 0;


        $gamesPlayed += DB::table('fixtures')
        ->where('home_team_id', $id)
        ->orWhere('away_team_id', $id)->count();

        $gamesWon += DB::table('fixtures')
            ->where('home_team_id', $id)
            ->where('home_team_score', '>', 'away_team_score')->count();

        $gamesWon += DB::table('fixtures')
            ->where('away_team_id', $id)
            ->where('home_team_score', '<', 'away_team_score')->count();

        $tournamentsPlayed = DB::table('tournament_winners')->where('team_id', $id)->get();


        $data = [
            $id =>
            [
            'games_won' => $gamesWon,
            'games_played' => $gamesPlayed,
            'tournaments_played' => $tournamentsPlayed,
        ]];

        return $data;
    }
}
