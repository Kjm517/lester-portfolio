<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\About;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed initial About content if none exists
        if (About::count() === 0) {
            About::create([
                'description' => 'Passionate full-stack developer with experience in Laravel, Vue.js, and modern web technologies. Focused on building scalable, user-centric applications.',
                'skills' => 'Laravel,Vue.js,JavaScript,PHP,MySQL,HTML,CSS,REST APIs,Git,Node.js'
            ]);
        }
    }
}
