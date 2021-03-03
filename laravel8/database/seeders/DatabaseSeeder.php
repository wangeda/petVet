<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Customer;
use App\Models\Pet;
use App\Models\Employee;
use App\Models\Procedure;
use App\Models\Appointment;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		Customer::factory(30)->create();
		Pet::factory(30)->create();
		Employee::factory(30)->create();
		Procedure::factory(10)->create();
		Appointment::factory(20)->create();
        // \App\Models\User::factory(10)->create();
    }
}
