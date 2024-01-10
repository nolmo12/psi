<?php

use App\Http\Controllers\FixtureController;
use App\Http\Controllers\GameController;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Models\Fixture;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get("/games",[GameController::class,"index"])->name('games');

// Route::get("/games/{id}",[GameController::class,"show"])->name('game/{id}');

// Route::get("/tournaments/{id}", [TournamentController::class, 'show']);

//Route::get("/teams", [TeamController::class, 'index'])->name('teams');

Route::get("/tournament-form", [TournamentController::class, 'create'])->name('create-tournament');
Route::post("/tournament-store-form", [TournamentController::class, 'store']);

Route::get("/games", function()
{
    return Game::all();
});

Route::get("/teams", function()
{
    return Team::all();
});

Route::get("/games/{id}",[GameController::class,"show"])->name('game/{id}');

Route::get("/tournaments", [TournamentController::class, 'index']);

Route::get("/tournaments/{id}", [TournamentController::class, 'show']);

Route::get("/teams/ranking", [TeamController::class, 'ranking']);

Route::get("/teams/{id}", [TeamController::class, 'statistic']);

Route::get("/fixtures",[FixtureController::class, 'index']);

Route::get("/fixtures/{id}",[FixtureController::class, 'show']);

Route::get("/add-team", [TeamController::class, 'insert']);
Route::post("/store-team-form", [TeamController::class, 'store']);
Route::get("/add-fixture", [FixtureController::class, 'insert']);
Route::post("/store-fixture-form", [FixtureController::class, 'store']);

Route::get('users', function () {
    return User::all();
});

Route::get('users/ranking', [ProfileController::class, 'statistic']);

Route::get('users/ranking2', [ProfileController::class, 'stats']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
