<?php

namespace App\Products\Domain\Resources;

use App\Products\Domain\Resources\ProductIndexResource;
use App\Products\Domain\Resources\ProductVariationResource;

class ProductResource extends ProductIndexResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return array_merge(Parent::toArray($request), [
			'variations' => ProductVariationResource::collection($this->variations->groupBy('type.name')),
		]);
	}
}