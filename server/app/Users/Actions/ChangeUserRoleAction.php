<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\User;
use App\Users\Domain\Requests\ChangeUserRoleFormRequest;
use App\Users\Domain\Services\ChangeUserRoleService;
use App\Users\Responders\ChangeUserRoleResponder;

class ChangeUserRoleAction {
	public function __construct(ChangeUserRoleResponder $responder, ChangeUserRoleService $services) {
		$this->responder = $responder;
		$this->services = $services;
	}
	public function __invoke(ChangeUserRoleFormRequest $request, User $user) {
		return $this->responder->withResponse(
			$this->services->handle($request->validated(), $user)
		)->respond();
	}
}
