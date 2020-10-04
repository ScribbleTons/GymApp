<?php

namespace Database\Factories;

use App\Models\Reminder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ReminderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reminder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lead_id' =>1,
            'user_id'=>1,
            'reminder' =>$this->faker->sentence,

            'reminder_date' => Carbon::now()->addDays(2),
            'note' => 'Not interested in a plan',
            'status' => 'Pending',
        ];
    }
}
