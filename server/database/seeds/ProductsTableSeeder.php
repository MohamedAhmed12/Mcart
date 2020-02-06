<?php

use App\Products\Domain\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Product::create([
			'name' => 'product1',
			'slug' => 'product1',
			'price' => 1523,
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi error magni deleniti officia quasi natus quidem debitis, quo, molestias nemo odit eum obcaecati maiores. Vel odit, saepe molestias placeat nulla.',
		])->categories()->sync([1]);
		Product::create([
			'name' => 'product15',
			'slug' => 'product18',
			'price' => 1623,
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi error magni deleniti officia quasi natus quidem debitis, quo, molestias nemo odit eum obcaecati maiores. Vel odit, saepe molestias placeat nulla.',
		])->categories()->sync([1]);
		Product::create([
			'name' => 'coffee',
			'slug' => 'coffee',
			'price' => 1623,
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi error magni deleniti officia quasi natus quidem.',
		])->categories()->sync([1]);
	}
}
