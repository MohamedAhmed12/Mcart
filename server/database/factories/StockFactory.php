<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stocks\Domain\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
	return [
		'quantity' => 1,
	];
});
