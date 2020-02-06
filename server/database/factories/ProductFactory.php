<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products\Domain\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
	return [
		'name' => $name = $faker->unique()->name,
		'slug' => Str::slug($name),
		'description' => $faker->sentence(5),
		'price' => 1000,
	];
});
