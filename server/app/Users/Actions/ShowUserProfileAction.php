<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Services\ShowUserProfileService;
use App\Users\Responders\ShowUserProfileResponder;

class ShowUserProfileAction {
	public function __construct(ShowUserProfileResponder $responder, ShowUserProfileService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(User $user) {
		return $this->responder->withResponse(
			$this->services->handle($user)
		)->respond();
	}
}