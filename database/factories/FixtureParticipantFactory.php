<?php

namespace Database\Factories;

use App\Models\FixtureParticipant;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FixtureParticipant>
 */
class FixtureParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fixtureRand = rand(1, 31);
        $userRand = rand(1, 31);
        $count = DB::table('fixture_participants')
        ->where('user_id', $userRand)
        ->where('fixture_id', $fixtureRand)
        ->count();
        while($count > 0)
        {
            $fixtureRand = rand(1, 31);
            $userRand = rand(1, 31);
        }
        return [
            'fixture_id' => $fixtureRand,
            'user_id' => rand(1, 31),
        ];
    }
}
