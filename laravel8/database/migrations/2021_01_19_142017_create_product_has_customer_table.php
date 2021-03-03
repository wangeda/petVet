<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHasCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_has_customer', function (Blueprint $table) {
            $table->id();
			
			$table->foreignId('product_id')->unsigned()->index();
			$table->foreignId('customer_id')->unsigned()->index();
			$table->string('amount', 5)->nullable(false);
			$table->date('order_date')->nullable(false);

			
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_has_customer');
    }
}
