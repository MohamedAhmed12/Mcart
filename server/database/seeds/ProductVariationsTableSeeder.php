<?php

use Illuminate\Database\Seeder;

class ProductVariationsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// DB::table('variations')->insert([
		// 	'product_id' => 1,
		// 	'name' => 'UK 9',
		// 	'price' => 1220,
		// 	'order' => 1,
		// ]);
		// DB::table('variations')->insert([
		// 	'product_id' => 1,
		// 	'name' => 'UK 10',
		// 	'price' => 1220,
		// 	'order' => 2,
		// ]);
		DB::table('variations')->insert([
			'product_id' => 3,
			'name' => '250g',
			'price' => 1220,
			'order' => 1,
			'product_variation_type_id' => 1,
		]);
		DB::table('variations')->insert([
			'product_id' => 3,
			'name' => '500g',
			'price' => 1220,
			'order' => 1,
			'product_variation_type_id' => 1,
		]);
		DB::table('variations')->insert([
			'product_id' => 3,
			'name' => '1kg',
			'price' => 1220,
			'order' => 1,
			'product_variation_type_id' => 1,
		]);
		DB::table('variations')->insert([
			'product_id' => 3,
			'name' => '250g',
			'price' => 1220,
			'order' => 1,
			'product_variation_type_id' => 2,
		]);
		DB::table('variations')->insert([
			'product_id' => 3,
			'name' => '500g',
			'price' => 1220,
			'order' => 1,
			'product_variation_type_id' => 2,
		]);
		DB::table('variations')->insert([
			'product_id' => 3,
			'name' => '1kg',
			'price' => 1220,
			'order' => 1,
			'product_variation_type_id' => 2,
		]);

	}
}
