<?php

use App\Orders\Domain\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Order::create([
			'user_id' => 1,
		]);
	}
}
