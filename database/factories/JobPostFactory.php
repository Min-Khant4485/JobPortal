<?php

namespace Database\Factories;

use App\Models\JobPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employer_id' => function () {
                return \App\Models\Employer::factory()->create()->id;
            },
            'city_id' => function () {
                return \App\Models\City::factory()->create()->id;
            },
            'job_title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'requirement' => $this->faker->paragraph,
            'salary' => $this->faker->numberBetween(20000, 100000),
            'closing_date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'job_type_id' => function () {
                return \App\Models\Common::factory()->create()->id;
            },
            'currency_id' => function () {
                return \App\Models\Common::factory()->create()->id;
            },
            'job_status_id' => function () {
                return \App\Models\Common::factory()->create()->id;
            },
        ];
    }
}
