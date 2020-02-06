<?php

namespace App\Products\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ProductVariationResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		// get into each object of the ProductVariationResource collection then return resource collection for this objects
		if ($this->resource instanceof Collection) {
			return ProductVariationResource::collection($this->resource);
		}
		return [
			'id' => $this->id,
			'name' => $this->name,
			'price' => $this->formattedPrice,
			'price_varies' => $this->priceVaries(),
			'stock_count' => (int) $this->stockCount(),
			'in_stock' => $this->inStock(),
		];
	}
}