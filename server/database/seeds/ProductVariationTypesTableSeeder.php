<?php

use Illuminate\Database\Seeder;

class ProductVariationTypesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('product_variation_types')->insert([
			'name' => 'Whole bean',
		]);
		DB::table('product_variation_types')->insert([
			'name' => 'Ground',
		]);
	}
}
