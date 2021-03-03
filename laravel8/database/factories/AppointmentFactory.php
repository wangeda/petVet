<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'=>$this->faker->dateTimeBetween('-2 years', '-2 days'),
			'start_time'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
			
			'registration_date'=>$this->faker->dateTimeBetween('-2 years', '-2 days'),
			'user_registration'=>$this->faker->numberBetween(1,30),
			
			'modification_date'=>$this->faker->dateTimeBetween('-2 years', '-2 days'),
			'user_modification'=>$this->faker->numberBetween(1,30),
			
			
			
			'pet_id'=>$this->faker->numberBetween(1,30),
			'procedure_id'=>$this->faker->numberBetween(1,10)
			
		];
    }
}


