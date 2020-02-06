<?php

namespace Tests\Feature\Products;

use App\Products\Domain\Models\Product;
use Tests\TestCase;

class ProductIndexTest extends TestCase {
	public function test_it_shows_a_collection_of_products() {
		$product = factory(Product::class)->create();
		$this->json('GET', 'api/products')
			->assertJsonFragment([
				'slug' => $product->slug,
			]);
	}
	public function test_it_has_paginated_data() {
		$this->json('GET', 'api/products')
			->assertjsonStructure([
				'links',
				'meta',
			]);
	}
}
