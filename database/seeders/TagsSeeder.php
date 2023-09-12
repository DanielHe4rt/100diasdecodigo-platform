<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('100days.tags') as $tag) {
            Tag::query()->updateOrCreate(['name' => $tag]);
        }
    }
}
