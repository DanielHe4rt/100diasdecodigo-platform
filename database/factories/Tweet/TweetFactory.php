<?php

namespace Database\Factories\Tweet;

use App\Models\Tweet\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    protected $model = Tweet::class;

    public function definition(): array
    {
        return [
            'twitter_id' => User::factory()->create()->twitter_id,
            'tweet_id' => $this->faker->unique()->randomNumber(5),
            'content' => $this->faker->text(),
            'likes_count' => $this->faker->randomNumber(),
            'replies_count' => $this->faker->randomNumber(),
            'views_count' => $this->faker->randomNumber(),
            'tweeted_at' => $this->faker->dateTime(),
        ];
    }
}
