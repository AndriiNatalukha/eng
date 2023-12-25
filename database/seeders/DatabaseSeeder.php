<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // WordCategorySeeder::class,
            // WordSeeder::class,
            // Додайте інші сідери, якщо потрібно
        ]);
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User 8',
            'email' => 'test8@example.com',
        ]);

        Post::factory(30)->for($user)->create();
    }
}
