<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\LeaveType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveCounter>
 */
class LeaveCounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = LeaveType::pluck('id');
        $users = User::all()->pluck('id');

        return [
            'leave_type_id'=>$this->faker->randomElement($type),
            'total'=>rand(6,22),
            'taken'=>rand(6,22),
            'user_id'=>$this->faker->randomElement($users),
        ];
    }
}
