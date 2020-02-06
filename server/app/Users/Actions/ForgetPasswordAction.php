<?php

namespace App\Users\Actions;

use App\Users\Domain\Services\ForgetPasswordService;
use App\Users\Responders\ForgetPasswordResponder;
use Illuminate\Http\Request;

class ForgetPasswordAction {
	public function __construct(ForgetPasswordResponder $responder, ForgetPasswordService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(Request $request) {
		return $this->responder->withResponse(
			$this->services->handle($request)
		)->respond();
	}
}