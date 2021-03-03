<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

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
			'date_of_birth' => $this->faker->dateTimeBetween('-80 years', '-18 years'),
			'dni' => $this->faker->dni(),        
			'address'=>$this->faker->address(),
			'CP'=>$this->faker->postcode(),
			'mobile'=>$this->faker->tollFreeNumber(),
			'email'=>$this->faker->email(),
		];
    }
}




