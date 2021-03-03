<?php

namespace Database\Factories;

use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcedureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Procedure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'procedure_date'=>$this->faker->dateTimeBetween('-2 years', '-2 days'),
			'type'=>$this->faker->randomElement(['vaccinations', 'consultation', 'cut hair', 'cut nails']),
			'departament_id'=>$this->faker->randomElement(['1', '2', '3']),
        ];
    }
}

