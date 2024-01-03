<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Game;
use App\Models\Team;
use App\Models\Fixture;
use App\Models\Tournament;
use Illuminate\Database\Seeder;
use App\Models\FixtureParticipant;
use App\Models\TeamMember;
use App\Models\TournamentParticipant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(60)->create();
        // Game::factory(6)->create();
        // Tournament::factory(20)->create();
        // Team::factory(32)->create();
        // Fixture::factory(31)->create();
        // TournamentParticipant::factory(32)->create();
        //FixtureParticipant::factory(30)->create();
        TeamMember::factory(60)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
