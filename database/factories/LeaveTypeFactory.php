<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveType>
 */
class LeaveTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $leaveName = ['compensate','paid leave','maternity leave','paternity leave','special leave','Sick leave','Non paid leave'];
        return [
            'name' => $this->faker->randomElement($leaveName),
            'description' => $this->faker->paragraph(1),
        ];
    }
}
