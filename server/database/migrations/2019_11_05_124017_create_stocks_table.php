<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('stocks', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger('quantity');
			$table->unsignedBigInteger('variation_id');
			$table->timestamps();

			$table->foreign('variation_id')->references('id')->on('variations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('stocks');
	}
}
