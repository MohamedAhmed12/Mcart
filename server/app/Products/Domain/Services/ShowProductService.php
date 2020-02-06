<?php

namespace App\Products\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;

class ShowProductService extends Service {
	protected $products;
	public function __construct() {
	}
	public function handle($product = null) {
		return new GenericPayload($product);
	}
}