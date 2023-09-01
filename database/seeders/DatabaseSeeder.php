<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::factory(7)->create();
        $tags = Tag::factory(20)->create();
        $posts= Post::factory(100)->create();

        foreach ($posts as $post) {
            $tagsId = $tags->random(2)->pluck('id');
            $post->tags()->attach($tagsId);
        }
        // \App\Models\User::factory(10)->create();
    }
}
