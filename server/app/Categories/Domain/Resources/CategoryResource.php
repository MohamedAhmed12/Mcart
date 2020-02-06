<?php

namespace App\Categories\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource {
	public function toArray($request) {
		return [
			'name' => $this->name,
			'slug' => $this->slug,
			'children' => CategoryResource::collection($this->whenLoaded('children')),
		];
	}
}