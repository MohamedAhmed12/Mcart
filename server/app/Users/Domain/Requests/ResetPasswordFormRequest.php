<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

Class ResetPasswordFormRequest extends APIRequest {
	public function rules() {
		return [
			'id' => 'required|numeric',
			'reset' => 'required',
			'newPassword' => 'required|confirmed',
		];
	}
}