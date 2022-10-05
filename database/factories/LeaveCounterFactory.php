<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
        //Not Correct factory 
        $type =['paid leave','Sick leave'];
        $users = User::all()->pluck('id');

        return [
            'type'=>$this->faker->randomElement($type),
            'total'=>rand(6,22),
            'taken'=>rand(6,22),
            'user_id'=>$this->faker->randomElement($users),
        ];
    }
}
