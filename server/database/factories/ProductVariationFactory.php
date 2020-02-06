<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products\Domain\Models\Product;
use App\Products\Domain\Models\ProductVariationType;
use App\Products\Domain\Models\Variation;
use Faker\Generator as Faker;

$factory->define(Variation::class, function (Faker $faker) {
	return [
		'product_id' => factory(Product::class)->create()->id,
		'name' => $faker->unique()->name,
		'product_variation_type_id' => factory(ProductVariationType::class)->create()->id,
	];
});
