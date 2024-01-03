<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function statistic()
    {
        
        $stats = DB::table('users')
        ->select(
            'users.id as user_id',
            'users.name as user_name',
            DB::raw('COUNT(fixture_participants.user_id) as games_played'),
            DB::raw('SUM(CASE WHEN fixtures.home_team_score > fixtures.away_team_score AND fixture_participants.user_id = fixtures.home_team_id THEN 1
                          WHEN fixtures.away_team_score > fixtures.home_team_score AND fixture_participants.user_id = fixtures.away_team_id THEN 1
                          ELSE 0 END) as games_won')
        )
        ->leftJoin('fixture_participants', 'users.id', '=', 'fixture_participants.user_id')
        ->leftJoin('fixtures', function ($join) {
            $join->on('fixture_participants.fixture_id', '=', 'fixtures.id');
        })
        ->groupBy('users.id', 'users.name')
        ->orderByDesc('games_won')
        ->get();
    
    $data = [
        $stats,
    ];
    return $data;
    }

    public function stats()
    {
        $user = User::find(5);
        return $user->teams;
        /*foreach($user->fixtures as $fixture)
        {
            echo $fixture;
        }*/
    }
}
