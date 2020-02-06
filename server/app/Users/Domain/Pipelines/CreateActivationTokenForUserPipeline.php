<?php

namespace App\Users\Domain\Pipelines;

use App\App\Domain\Contracts\Pipeline;
use App\Users\Domain\Events\UserWasRegistered;
use App\Users\Domain\Repositories\ActivationRepository;

class CreateActivationTokenForUserPipeline implements Pipeline {
	protected $activations;

	public function __construct(ActivationRepository $activations) {
		$this->activations = $activations;
	}

	public function handle($user, \Closure $next) {
		$this->activations->generateToken($user);
		event(new UserWasRegistered($user));

		return $next($user);
	}
}
