<?php

use Illuminate\Database\Seeder;

class ProductVariationOrdersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('product_variation_orders')->insert([
			'order_id' => 1,
			'variation_id' => 3,
			'quantity' => 50,
		]);
	}
}
