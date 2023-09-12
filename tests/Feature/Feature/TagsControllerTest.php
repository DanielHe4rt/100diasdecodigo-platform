<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagsControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_fetch_tags(): void
    {
        $tags = Tag::factory()->create();

        $this->getJson(route('tags.index'))
            ->assertOk()
            ->assertJsonStructure(['data']);
    }
}
