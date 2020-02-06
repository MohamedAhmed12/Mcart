<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\UserRepository;

class ActivationUserService extends Service {
	protected $users;
	protected $activation;
	public function __construct(UserRepository $users, ActivationRepository $activation) {
		$this->users = $users;
		$this->activation = $activation;
	}
	public function handle($request = []) {
		// get the user with this given token
		$user = $this->users->getById($request['id']);
		// if user didn't activated return error
		if ($activating = $this->activation->complete($user, $request['token'])) {
			$login = auth()->login($user);
			return new GenericPayload([
				'redirect' => 'Dashboard',
			]);
		}
		return new ValidationPayload($activating);

	}
}