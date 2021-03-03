<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
			$table->string('name', 50)->nullable(false);
			$table->string('specie', 30)->nullable(false);
			$table->string('breed', 30)->nullable(true);
		    $table->foreignId('gender_id')->nullable(false);
			$table->date('date_of_birth', 14)->nullable(false);
			$table->mediumText('allergies')->nullable(false);
			$table->mediumText('chronic_condition');
			$table->date('vaccination_date', 14)->nullable(true);
			
			$table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
			
			$table->foreignId('customer_id')->unsigned()->index();
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

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
        Schema::dropIfExists('pets');
    }
}
