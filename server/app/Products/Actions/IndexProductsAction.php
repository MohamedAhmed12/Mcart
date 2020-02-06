<?php

namespace App\Products\Actions;

use App\Products\Domain\Services\IndexProductsService;
use App\Products\Responders\IndexProductsResponder;
use Illuminate\Http\Request;

class IndexProductsAction {
	public function __construct(IndexProductsResponder $responder, IndexProductsService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(Request $request) {
		return $this->responder->withResponse(
			$this->services->handle($request)
		)->respond();
	}
}