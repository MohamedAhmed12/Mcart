<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products\Domain\Models\ProductVariationType;
use Faker\Generator as Faker;

$factory->define(ProductVariationType::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->name,
	];
});
