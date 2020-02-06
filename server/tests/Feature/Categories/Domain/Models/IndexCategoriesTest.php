<?php

namespace Tests\Unit\Categories\Domain\Models;

use App\Categories\Domain\Models\Category;
use Tests\TestCase;

class IndexCategoriesTest extends TestCase {
	/**
	 * A basic unit test example.
	 *
	 * @return void
	 */
	public function test_it_returns_a_collection_of_categories() {
		// cerate 2 cat
		$categories = factory(Category::class, 2)->create();
		// get the response of the end point
		$response = $this->json('GET', '/api/categories');
		// for each cat assert to check for slug
		$categories->each(function ($category) use ($response) {
			$response->assertJsonFragment([
				'slug' => $category->slug,
			]);
		});
	}
	public function test_it_returns_only_parent_of_the_categories() {
		$mainCategory = factory(Category::class)->create();
		$categories = factory(Category::class, 2)->create();

		$categories->each(function ($category) use ($mainCategory, $categories) {

			$mainCategory->children()->save($category);
		});
		$this->json('GET', 'api/categories')
			->assertJsonCount(1, 'data');
	}
	public function test_it_returns_categories_ordered_by_their_given_order() {
		$category = factory(Category::class)->create([
			'order' => 2,
		]);
		$anothercategory = factory(Category::class)->create([
			'order' => 1,
		]);

		$this->json('GET', 'api/categories')
		// this categories accepted to be in this order -> asertSeeInOrder($order)
			->assertSeeInOrder([
				$anothercategory->slug,
				$category->slug,
			]);
	}
}
