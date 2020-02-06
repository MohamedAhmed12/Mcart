<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class ActivationUserFormRequest extends APIRequest {
	public function rules() {
		return [
			'id' => 'required|numeric',
			'token' => 'required',
		];
	}
}