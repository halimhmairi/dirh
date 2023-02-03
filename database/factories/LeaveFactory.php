<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id');
        //$events = ['compensate','paid leave','maternity leave','paternity leave','special leave','Sick leave','Non paid leave']; 
        $leaveType_ids = LeaveType::pluck('id'); 
        $status = ['Cancelled','Rejected','Accepted','Planned'];

        return [
          'start_date' => Carbon::now(),
          'end_date' => Carbon::now()->addDays(rand(2,12)),
          'leave_type_id' => $this->faker->randomElement($leaveType_ids),
          'status' => $this->faker->randomElement($status),
          'user_id' => $this->faker->randomElement($users),
        ];
    }
}
