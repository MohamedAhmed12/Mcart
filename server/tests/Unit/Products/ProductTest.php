<?php

namespace Tests\Unit\Products;

use App\App\Cart\Money;
use App\Categories\Domain\Models\Category;
use App\Products\Domain\Models\Product;
use App\Products\Domain\Models\Variation;
use App\Stocks\Domain\Models\Stock;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_it_uses_slug_for_route_key_name()
    {
        $product = new Product();
        $this->assertEquals('slug', $product->getRouteKeyName());
    }
    public function test_it_has_many_categories()
    {
        $product = factory(Product::class)->create();
        $product->categories()->save(
            factory(Category::class)->create(),
        );
        $this->assertInstanceOf(Category::class, $product->categories->first());
    }
    public function test_it_has_many_variations()
    {
        $product = factory(Product::class)->create();
        $product->variations()->save(
            factory(Variation::class)->create(),
        );
        $this->assertInstanceOf(Variation::class, $product->variations->first());
    }
    public function test_it_returns_money_instance_of_price()
    {
        $product = factory(Product::class)->create();
        $this->assertInstanceOf(Money::class, $product->price);
    }
    public function test_it_returns_formatted_price()
    {
        $product = factory(Product::class)->create([
            'price' => 1000,
        ]);

        $this->assertEquals($product->formattedPrice, '$10.00');
    }
    public function test_it_can_check_if_its_in_stock()
    {
        $product = factory(Product::class)->create();

        $product->variations()->save(
            $variation = factory(Variation::class)->create()
        );

        $variation->stocks()->save(
            factory(Stock::class)->make()
        );

        $this->assertTrue($product->inStock());
    }
    public function test_it_can_get_stock_count()
    {
        $product = factory(Product::class)->create();

        $product->variations()->save(
            $variation = factory(Variation::class)->create()
        );

        $variation->stocks()->save(
            factory(Stock::class)->make([
                'quantity' => 5,
            ])
        );

        $this->assertEquals($product->stockCount(), 5);
    }
}
