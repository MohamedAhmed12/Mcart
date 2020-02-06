<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteProductVariationOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product_variation_orders', function (Blueprint $table) {
			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('variation_id');
			$table->unsignedInteger('quantity');
			$table->timestamps();

			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('product_variation_orders');
	}
}
