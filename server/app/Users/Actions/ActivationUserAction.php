<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\ActivationUserFormRequest;
use App\Users\Domain\Services\ActivationUserService;
use App\Users\Responders\ActivationUserResponder;

class ActivationUserAction {
	public function __construct(ActivationUserResponder $responder, ActivationUserService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(ActivationUserFormRequest $request) {
		return $this->responder->withResponse(
			$this->services->handle($request->validated())
		)->respond();
	}
}