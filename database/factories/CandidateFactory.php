<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Job;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $jobs = Job::pluck('id')->toArray();
        $resumes = ['cv1.pdf','cv2.pdf','cv3.pdf'];
        $status = ['waiting','rejected','accepted'];
        return [
            'resume' => $this->faker->randomElement($resumes),
            'note' => $this->faker->paragraph(1),
            'status' => $this->faker->randomElement($status),
            'dirh_job_id' => $this->faker->randomElement($jobs),
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}
