<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Payloads\ValidationPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Repositories\RoleRepository;
use App\Users\Domain\Repositories\UserRepository;
use Illuminate\Support\Arr;

class CreateUserService extends Service {
	protected $users;
	protected $roles;

	public function __construct(UserRepository $users, RoleRepository $roles) {
		$this->users = $users;
		$this->roles = $roles;
	}
	public function handle($data = []) {
		if (auth()->user()->can('create-user')) {
			try {

				$data['password'] = bcrypt($data['password']);
				$user = $this->users->create(Arr::except($data, ['slug'])); //user creation
				// find the role by slug then attach it in pivot table to this user
				$this->roles->findRoleBySlug($data['slug'])->users()->attach($user);
				return new GenericPayload($user);
			} catch (Exception $e) {
				return new ValidationPayload($e);
			}
		}
		return new UnauthorizedPayload;
	}
}