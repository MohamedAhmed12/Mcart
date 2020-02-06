<?php

namespace Tests\Unit\Products;

use App\App\Cart\Money;
use App\Products\Domain\Models\Product;
use App\Products\Domain\Models\ProductVariationType;
use App\Products\Domain\Models\Variation;
use App\Stocks\Domain\Models\Stock;
use Tests\TestCase;

class ProductVariationTest extends TestCase {
	/**
	 * A basic unit test example.
	 *
	 * @return void
	 */
	public function test_it_has_one_variation_type() {
		$variation = factory(Variation::class)->create();
		$this->assertInstanceOf(ProductVariationType::class, $variation->type);
	}
	public function test_it_belongs_to_product() {
		$variation = factory(Variation::class)->create();
		$this->assertInstanceOf(Product::class, $variation->product);
	}
	public function test_it_returns_money_instance_of_price() {
		$variation = factory(Variation::class)->create();
		$this->assertInstanceOf(Money::class, $variation->price);
	}
	public function test_it_returns_formatted_price() {
		$variation = factory(Variation::class)->create([
			'price' => 1000,
		]);

		$this->assertEquals($variation->formattedPrice, '$10.00');
	}
	public function test_it_returns_the_product_price_if_price_is_null() {
		$product = factory(Product::class)->create([
			'price' => 1000,
		]);
		$variation = factory(Variation::class)->create([
			'price' => null,
			'product_id' => $product->id,
		]);
		$this->assertEquals($variation->price->amount(), $product->price->amount());
	}
	public function test_it_can_check_if_variation_price_different_to_product() {
		$product = factory(Product::class)->create([
			'price' => 1000,
		]);
		$variation = factory(Variation::class)->create([
			'price' => 2000,
			'product_id' => $product->id,
		]);
		$this->assertTrue($variation->priceVaries());
	}
	public function test_it_has_many_stocks() {
		$variation = factory(Variation::class)->create();
		$variation->stocks()->save(
			factory(Stock::class)->make()
		);
		$this->assertInstanceOf(Stock::class, $variation->stocks->first());
	}
	public function test_it_has_stock_infromation() {
		$variation = factory(Variation::class)->create();
		$variation->stocks()->save(
			factory(Stock::class)->make()
		);
		$this->assertInstanceOf(Variation::class, $variation->stock->first());
	}
	public function test_it_has_stock_count_pivot_within_sotck_infromation() {
		$variation = factory(Variation::class)->create();
		$variation->stocks()->save(
			factory(Stock::class)->make([
				'quantity' => $quantity = 5,
			])
		);
		$this->assertEquals($variation->stock->first()->pivot->stock, $quantity);
	}
	public function test_it_can_check_if_in_stock() {
		$variation = factory(Variation::class)->create();
		$variation->stocks()->save(
			factory(Stock::class)->make()
		);
		$this->assertEquals($variation->inStock(), 1);
	}
	public function test_it_can_check_it_can_get_stock_count() {
		$variation = factory(Variation::class)->create();
		$variation->stocks()->save(
			factory(Stock::class)->make([
				'quantity' => 5,
			])
		);
		$variation->stocks()->save(
			factory(Stock::class)->make([
				'quantity' => 5,
			])
		);
		$this->assertEquals($variation->inStock(), 10);
	}
}
