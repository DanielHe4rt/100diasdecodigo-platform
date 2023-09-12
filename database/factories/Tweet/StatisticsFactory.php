<?php

namespace Database\Factories\Tweet;

use App\Models\Tweet\Statistics;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatisticsFactory extends Factory
{
    protected $model = Statistics::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'days_participated' => $this->faker->randomNumber(2),
            'total_likes' => $this->faker->numberBetween(1000, 10000),
            'total_views' => $this->faker->numberBetween(1000, 10000),
            'total_replies' => $this->faker->numberBetween(1000, 10000),
            'max_streak' => $this->faker->randomNumber(2),
        ];
    }
}
