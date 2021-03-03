<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->firstNameMale(),
			'first_surname' => $this->faker->lastName(),
			'date_of_birth' => $this->faker->dateTimeBetween('-60 years', '-20 years'),
			'dni'=> $this->faker->dni(),
			'address'=>$this->faker->address(),
			'CP'=>$this->faker->postcode(),
			'mobile'=>$this->faker->tollFreeNumber(),
			'email'=>$this->faker->email(),
			'specialization'=>$this->faker->randomElement(['Veterinary Anesthesiology', 'Veterinary Cardiology', 'Veterinary Sciences', 'Surgery', 'Dermatology', 'Physiotherapy', 'Neurology', 'Veterinary Ophthalmology', 'Orthopedics']),
			'department_id'=>$this->faker->randomElement(['1', '2', '3']),
			'driver_license'=>$this->faker->boolean(),
        ];
    }
}


