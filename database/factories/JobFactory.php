<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'jobsummary' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(50),
            'tags' => $this->faker->randomElement([
                'php,java,js',
                'html,css',
                'data,docker',
                'springboot,api,ios',
                'nodejs,api',
                'react,c,angular',
            ]),
            'status' => $this->faker->randomElement([
                'draft',
                'published',
            ]),
            'publish_at' => now(),
        ];
    }
}
