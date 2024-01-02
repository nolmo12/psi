<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TournamentParticipant>
 */
class TournamentParticipantFactory extends Factory
{
    static $i = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        TournamentParticipantFactory::$i++;
        return [
            'tournament_id' => 1,
            'team_id' => TournamentParticipantFactory::$i,
        ];
    }
}
