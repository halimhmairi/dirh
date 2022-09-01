<?php

namespace Database\Factories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id');
        $events = ['event 1','event 2','event 3'];
        return [
          'start_date' => Carbon::now(),
          'end_date' => Carbon::now()->addDays(rand(2,12)),
          'event_type' => $this->faker->randomElement($events),
          'user_id' => $this->faker->randomElement($users),
        ];
    }
}
