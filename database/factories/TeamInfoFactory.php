<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $games = $this->faker->numberBetween(4, 10);
        $draws = $this->faker->numberBetween(0, 2);
        $loses = $this->faker->numberBetween(0, 2);
        $wins = $games - ($draws + $loses);
        $points = ($wins * 3) + $draws;
        $goals = $this->faker->numberBetween(0, 4);
        $goals_against = $this->faker->numberBetween(0, 4);

        return [
            'team_id' => Team::inRandomOrder()->first()->id,
            'points' => $points,
            'games' => $games,
            'wins' => $wins,
            'draws' => $draws,
            'loses' => $loses,
            'goals' => $goals,
            'goals_against' => $goals_against,
            'goal_difference' => $goals - $goals_against,
        ];
    }
}
