<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fixture>
 */
class FixtureFactory extends Factory
{
    static $i = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        FixtureFactory::$i++;
        if(FixtureFactory::$i > 0 && FixtureFactory::$i < 17)
        {
            return [
                'tournament_id' => 1,
                'round_number' => 5,
            ];
        }
        else if(FixtureFactory::$i > 16 && FixtureFactory::$i < 25)
        {
            return [
                'tournament_id' =>  1,
                'round_number' => 4,
            ];
        }
        else if(FixtureFactory::$i > 24 && FixtureFactory::$i < 29)
        {
            return [
                'tournament_id' =>  1,
                'round_number' => 3,
            ];
        }
        else if(FixtureFactory::$i > 28 && FixtureFactory::$i < 31)
        {
            return [
                'tournament_id' =>  1,
                'round_number' => 2,
            ];
        }
        else
        {
            return [
                'tournament_id' =>  1,
                'round_number' => 1,
            ];  
        }
    }
}
