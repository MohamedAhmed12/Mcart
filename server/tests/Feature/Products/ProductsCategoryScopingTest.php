<?php

namespace Tests\Feature;

use App\Categories\Domain\Models\Category;
use App\Products\Domain\Models\Product;
use Tests\TestCase;

class ProductsCategoryScopingTest extends TestCase {
	public function test_can_be_scooped_by_category() {
		$product = factory(Product::class)->create();
		$product->categories()->save(
			$category = factory(Category::class)->create()
		);
		$anotherProduct = factory(Product::class)->create();
		$this->json('GET', "api/products?category={$category->slug}")
			->assertJsonCount(1, 'data');
	}
}
