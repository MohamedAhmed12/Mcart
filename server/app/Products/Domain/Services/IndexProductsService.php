<?php

namespace App\Products\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Products\Domain\Repositories\ProductRepository;
use App\Products\Domain\Scopes\CategoryScope;

class IndexProductsService extends Service {
	protected $products;
	public function __construct(ProductRepository $products) {
		$this->products = $products;
	}
	public function handle($request = []) {
		return new GenericPayload($this->products->withScopes($this->scopes())->paginate(10));
	}
	public function scopes() {
		return [
			'category' => new CategoryScope,
		];
	}
}