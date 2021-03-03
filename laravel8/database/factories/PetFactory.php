<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(['Pancho', 'Beethoven', 'Bruno', 'Niebla', 'Pluto', 'Rex', 'Scooby', 'Doo', 'Dama', 'Golfo', 'Snoopy', 'Milú', 'Odie', 'Laika', 'Marley', 'Shasta','Hachiko', 'Eros','Heiko', 'Aura', 'Casper', 'Khali', 'Morfeo', 'Luna', 'Sol', 'Sansón', 'Dexter', 'Sansa', 'Arya', 'Mushu', 'Hodor', 'Chulin', 'Togo', 'Morty']),
			'specie'=>$this->faker->randomElement(['Lagartos', 'Serpientes', 'Cobayas', 'Conejos', 'Gatos', 'Perros', 'Otros']),
			'gender_id'=>$this->faker->randomElement([1,2]),
			'date_of_birth'=>$this->faker->dateTimeBetween('-10 years', '-15 days'),
			'allergies'=>$this->faker->randomElement(['None', 'Pollen', 'Dust', 'Mold', 'Fleas', 'Bee', 'Wasp']),
			'chronic_condition'=>$this->faker->randomElement(['Chronic kidney failure', 'Hyperthyroidism', 'Diabetes', 'Leukemia virus', 'Immunodeficiency virus', 'Cancer', 'Gastric torsion', 'Lyme disease', 'Heartworm disease']),
			'vaccination_date'=>$this->faker->dateTimeBetween('-2 years', '-15 days'),			
			'customer_id'=>$this->faker->numberBetween(1,30),
        ];
    }
}





