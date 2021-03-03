<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
			$table->string('company_name', 80)->nullable(false);
			$table->foreignId('product_id')->unsigned()->index();
			$table->string('address', 100)->nullable(false);
			$table->string('CP', 7)->nullable(false);
			$table->string('phone', 11)->nullable(true);
		    $table->string('mobile', 11)->nullable(false);
		    $table->string('email', 60)->nullable(false);
			
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('suppliers');
    }
}

