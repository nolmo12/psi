<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $teamRand = rand(1, 31);
        $userRand = rand(1, 31);

        $count = DB::table('team_members')
        ->where('team_id', $teamRand)
        ->where('user_id', $userRand)
        ->count();
        while($count > 0)
        {
            $teamRand = rand(1, 31);
            $userRand = rand(1, 31);
        }
        return [
            'user_id' => $userRand,
            'team_id' => $teamRand
        ];
    }
}
