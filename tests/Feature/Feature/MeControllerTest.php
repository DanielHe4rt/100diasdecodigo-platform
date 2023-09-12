<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MeControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_retrieve_authenticated_user_profile()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->getJson(route('auth.profile'))
            ->assertOk()
            ->assertJsonFragment([
                'id' => $user->getKey(),
                'username' => $user->username
            ]);
    }

    public function test_user_can_sync_tags(): void
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();


        $payload = ['tags' => [$tag->getKey()]];

        $expected = [
            'attached' => [1],
            'detached' => [],
            'updated' => []
        ];

        $this
            ->actingAs($user)
            ->postJson(route('auth.profile.sync-tags'), $payload)
            ->assertCreated()
            ->assertJson($expected);

        $this->assertDatabaseHas('users_tags', [
            'user_id' => $user->getKey(),
            'tag_id' => $tag->getKey()
        ]);
    }

    public function test_user_should_not_sync_undefined_tags(): void
    {
        $user = User::factory()->create();

        $payload = ['tags' => [1]];
        $this
            ->actingAs($user)
            ->postJson(route('auth.profile.sync-tags'), $payload)
            ->assertUnprocessable();
    }
}
