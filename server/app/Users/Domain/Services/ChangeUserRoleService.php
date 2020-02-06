<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\ValidationPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Repositories\RoleRepository;
use App\Users\Domain\Repositories\UserRepository;

class ChangeUserRoleService extends Service {
	protected $users;
	protected $roles;
	public function __construct(UserRepository $users, RoleRepository $roles) {
		$this->users = $users;
		$this->roles = $roles;
	}
	public function handle($data = [], $user = null) {
		if (auth()->user()->can('change-user-role')) {
			try {
				// get role object
				$role = $this->roles->findRoleBySlug($data['slug']);
				// datch the old role
				$user->roles()->detach($user->roles()->first());
				// Set new role
				$user->roles()->attach($role);
				return new GenericPayload($user);
			} catch (Exception $e) {
				return new ValidationPayload($e);
			}
		}
		return new UnauthorizedPayload;
	}
}