<?php

namespace App\Users\Domain\Policies;

use App\Users\Domain\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy {
	use HandlesAuthorization;

	public function createUser(User $user) {
		return $user->hasRole('create-user');
	}
	public function changeUserRole(User $user) {
		return $user->hasRole('change-user-role');
	}
}