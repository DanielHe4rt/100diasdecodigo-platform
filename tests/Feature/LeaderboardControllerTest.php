<?php

namespace Tests\Feature;

use App\Models\Tweet\Statistics;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LeaderboardControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_retrieve_ranking(): void
    {
        $leader = Statistics::factory()->create(['days_participated' => 100]);
        $secondPosition = Statistics::factory()->create(['days_participated' => 50]);

        $this->get(route('leaderboard'))
            ->assertOk()
            ->assertJsonFragment([
                'data' => [
                    0 => ['id' => $leader->getKey()],
                    1 => ['id' => $secondPosition->getKey()]
                ]
            ]);

    }
}
