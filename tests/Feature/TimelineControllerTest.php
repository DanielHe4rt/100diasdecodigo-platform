<?php

namespace Tests\Feature;

use App\Models\Tweet\Tweet;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TimelineControllerTest extends TestCase
{
    use DatabaseMigrations;


    public function test_can_retrieve_timeline(): void
    {
        $tweets = Tweet::factory()->count(5)->create();

        $this->get(route('timeline'))
            ->assertOk()
            ->assertJsonStructure(['data']);
    }
}
