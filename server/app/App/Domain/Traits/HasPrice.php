<?php

namespace App\App\Domain\Traits;

use App\App\Cart\Money;

trait HasPrice {
	public function getPriceAttribute($value) {
		return new Money($value);
	}
	public function getFormattedPriceAttribute() {
		return $this->price->formatted();
	}
}