<?php

namespace Tests\Unit\Categories\Domain\Models;

use App\Categories\Domain\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase {
	public function setUp(): void{
		parent::setUp();
		$this->reminder = app(Category::class);
	}
	public function test_it_has_many_children() {
		// create one category with factory
		$category = factory(Category::class)->create();
		// save another category in it's children
		$category->children()->save(
			factory(Category::class)->create()
		);
		// assertInstanceOf(expected, actual)
		$this->assertInstanceOf(Category::class, $category->children->first());
	}
	public function test_it_can_fetch_only_parents() {
		$category = factory(Category::class)->create();
		$category->children()->save(
			factory(Category::class)->create()
		);
		$this->assertEquals(1, Category::parent()->count());
	}
	public function test_it_is_orderable_by_a_numbered_order() {
		$category = factory(Category::class)->create([
			'order' => 2,
		]);
		$anotherCategory = factory(Category::class)->create([
			'order' => 1,
		]);
		$this->assertEquals($anotherCategory->name, Category::ordered()->first()->name);
	}
}
