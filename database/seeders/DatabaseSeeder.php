<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employer;
use App\Models\Industry;
use App\Models\SkillCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\JobPost::factory(100)->create();

        \App\Models\User::create([
            'first_name' => 'System',
            'last_name' => 'Admin',
            'role' => '18',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            CommonSeeder::class,
            IndustrySeeder::class,
            SkillCategorySeeder::class,
            SkillsSetSeeder::class,
            SliderSeeder::class
        ]);
    }
}
