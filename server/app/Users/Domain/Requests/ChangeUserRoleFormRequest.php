<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;
use Illuminate\Support\Arr;

class ChangeUserRoleFormRequest extends APIRequest {
	public function rules() {
		return [
			'slug' => 'required|string|exists:roles,slug',
		];
	}
	public function validationData() {
		return array_merge(
			$this->request->all(),
			Arr::only($this->route()->parameters(), 'slug')
		);
	}
}
