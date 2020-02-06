<?php

use App\Stocks\Domain\Models\Stock;
use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Stock::create([
			'quantity' => 100,
			'variation_id' => 3,
		]);
	}
}
