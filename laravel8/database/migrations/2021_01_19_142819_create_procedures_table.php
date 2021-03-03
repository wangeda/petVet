<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
			$table->date('procedure_date', 14)->nullable(false);
			$table->string('type')->nullable(false);
			$table->foreignId('departament_id')->unsigned()->index();
			
            $table->foreign('departament_id')->references('id')->on('departments')->onDelete('cascade');

			
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
        Schema::dropIfExists('procedures');
    }
}
