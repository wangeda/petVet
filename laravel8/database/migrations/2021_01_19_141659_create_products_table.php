<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('name', 50)->nullable(false);
			$table->double('price', 15, 2)->nullable(false);
			$table->string('stock', 10)->nullable(false);
			$table->longText('description')->nullable(true);
			$table->foreignId('category_id')->unsigned()->index();
			$table->binary('img')->nullable(true);
			
			
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
