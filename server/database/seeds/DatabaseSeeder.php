<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call([
			RolesTableSeeder::class,
			UsersTableSeeder::class,
			CategoriesTableSeeder::class,
			ProductsTableSeeder::class,
			ProductVariationTypesTableSeeder::class,
			ProductVariationsTableSeeder::class,
			OrdersTableSeeder::class,
			ProductVariationOrdersTableSeeder::class,
			StocksTableSeeder::class,
		]);
	}
}
