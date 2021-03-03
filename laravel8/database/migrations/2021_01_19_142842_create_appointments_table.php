<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
			$table->date('date', 14)->nullable(false);
			$table->time('start_time')->default('23:59:59')->nullable(false);
			$table->time('end_time')->nullable(true);
			
			
			$table->string('registration_date')->nullable(false);
			$table->foreignId('user_registration')->unsigned()->index();
			
			
			$table->string('modification_date')->nullable(true);
			$table->foreignId('user_modification')->unsigned()->nullable(true)->index();

			
			$table->foreign('user_registration')->references('id')->on('employees')->onDelete('cascade');
			$table->foreign('user_modification')->references('id')->on('employees')->onDelete('cascade');
			
			$table->foreignId('pet_id')->unsigned()->index();
			$table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');

			$table->foreignId('procedure_id')->unsigned()->index();
			$table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
			
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
