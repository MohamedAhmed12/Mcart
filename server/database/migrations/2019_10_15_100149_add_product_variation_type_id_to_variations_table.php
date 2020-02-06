<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductVariationTypeIdToVariationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('variations', function (Blueprint $table) {
			$table->unsignedBigInteger('product_variation_type_id')->index()->nullable();

			$table->foreign('product_variation_type_id')->references('id')->on('product_variation_types')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('variations', function (Blueprint $table) {
			$table->dropColumn('product_variation_type_id');
		});
	}
}
