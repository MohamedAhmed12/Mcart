<?php

namespace App\Users\Domain\Pipelines;

use App\App\Domain\Contracts\Pipeline;
use App\Users\Domain\Repositories\RoleRepository;

class AttachUserToRolePipeline implements Pipeline {
	protected $roles;

	public function __construct(RoleRepository $roles) {
		$this->roles = $roles;
	}

	public function handle($user, \Closure $next) {
		$this->roles->findRoleBySlug('soldier')->users()->attach($user);
		return $next($user);
	}
}
