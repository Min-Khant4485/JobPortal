<?php

namespace Database\Seeders;

use App\Models\SkillCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skilCategories = [
            'Acting Skills',
            'Analytical skills',
            'Communication skills',
            'Creativity skills',
            'Critical thinking skills',
            'Design skills',
            'Hard Skills',
            'Interpersonal skills',
            'Language skills',
            'Leadership skills',
            'Soft Skills',
            'Technical skills',
        ];
        foreach ($skilCategories as $skillCategory) {
            SkillCategory::firstOrCreate([
                'category_name' => $skillCategory
            ]);
        }
    }
}
