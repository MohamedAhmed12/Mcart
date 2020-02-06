<?php

namespace App\App\Domain\Payloads;
class UnauthorizedPayload extends Pyaload {
	protected $status = 401;
	protected $data = ['message' => 'this user isn\'t authorized'];
}