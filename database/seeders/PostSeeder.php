<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Using Faker to generate random data
        $faker = Faker::create();

        // Create 10 posts
        foreach (range(1, 10) as $index) {
            Post::create([
                'user_id' => 1, // Assuming a user with ID 1 exists, adjust as necessary
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
