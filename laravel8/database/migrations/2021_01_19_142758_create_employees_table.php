<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
			$table->string('name', 45)->nullable(false);
			$table->string('first_surname', 50)->nullable(false);
			$table->string('second_surname', 50)->nullable(true);
			$table->date('date_of_birth', 14)->nullable(false);
			$table->string('dni', 15)->nullable(false);
			$table->string('address', 100)->nullable(false);
			$table->string('CP', 7)->nullable(false);
			$table->string('phone', 11)->nullable(true);
		    $table->string('mobile', 11)->nullable(false);
		    $table->string('email', 60)->nullable(false);
			$table->string('specialization', 50)->nullable(false);
		    $table->boolean('driver_license')->nullable(false);
			$table->foreignId('department_id')->unsigned()->index();
			$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
