<?php

namespace App\Products\Domain\Scopes;

use App\App\Domain\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class CategoryScope implements Scope {
	public function apply(Builder $builder, $value) {
		return $builder->whereHas('categories', function ($builder) use ($value) {
			$builder->where('slug', $value);
		});
	}
}