<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Services\ValidateUserReminderTokenService;
use App\Users\Responders\ValidateUserReminderTokenResponder;

class ValidateUserReminderTokenAction {
	public function __construct(ValidateUserReminderTokenResponder $responder, ValidateUserReminderTokenService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(User $user, $token) {
		return $this->responder->withResponse(
			$this->services->handle($user, $token)
		)->respond();
	}
}
