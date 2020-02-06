<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\ResetPasswordFormRequest;
use App\Users\Domain\Services\ResetPasswordService;
use App\Users\Responders\ResetPasswordResponder;

class ResetPasswordAction {
	public function __construct(ResetPasswordResponder $responder, ResetPasswordService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(ResetPasswordFormRequest $request) {
		return $this->responder->withResponse(
			$this->services->handle($request->validated())
		)->respond();
	}
}