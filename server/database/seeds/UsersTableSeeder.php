<?php

use App\Users\Domain\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$admin = User::create([
			'username' => 'admin',
			'email' => 'admin@adsoldiers.com',
			'password' => bcrypt('123'),
		]);
		// give the user role admin
		$admin->roles()->sync([1]);
	}
}
