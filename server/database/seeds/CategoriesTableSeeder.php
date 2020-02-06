<?php

use App\Categories\Domain\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Category::create([
			'name' => 'shoes',
			'slug' => 'shoes',
			'order' => 1,
		]);

		Category::create([
			'name' => 'electronics',
			'slug' => 'electronics',
			'order' => 2,
		]);
		Category::create([
			'name' => 'laptops',
			'slug' => 'laptops',
			'parent_id' => 1,
			'order' => 2,
		]);
	}
}
