<?php

namespace App\App\Domain\Scoping;

use App\App\Domain\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Scoper {
	protected $request;
	public function __construct(Request $request) {
		$this->request = $request;
	}
	public function apply(Builder $builder, array $scopes) {
		foreach ($this->limitScopes($scopes) as $key => $scope) {
			if (!$scope instanceof Scope) {
				continue;
			}
			$scope->apply($builder, $this->request->get($key));
		}
		return $builder;
	}
	public function limitScopes(array $scopes) {
		return Arr::only(
			$scopes,
			array_keys($this->request->all())
		);
	}
}