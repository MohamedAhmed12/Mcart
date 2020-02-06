<?php

namespace Tests\Feature\Products;

use Tests\TestCase;

class ProductShowTest extends TestCase {
	public function test_it_fails_if_product_cant_be_found() {
		$this->json('GET', 'api/products/blanka')
			->assertStatus(404);
	}
}
