<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use Illuminate\Support\Arr;

class LoginUserService extends Service {
	public function handle($data = []) {

		if (auth()->attempt(
			Arr::except($data, 'remember'),
		) && ($isActivated = auth()->user()->isActivated())) {
			return new GenericPayload([
				auth()->user()->generateAuthToken(),
			], 200);
		}
		if (isset($isActivated) && !$isActivated) {
			auth()->logout();
			return new UnauthorizedPayload([
				'errors' => 'User is not activated yet, Please activate your account to be able to login ',
			]);
		}
		return new UnauthorizedPayload;
	}
}
