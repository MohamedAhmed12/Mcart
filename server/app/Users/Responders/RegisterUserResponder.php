<?php

namespace App\Users\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Users\Domain\Resources\UserResource;

class RegisterUserResponder extends Responder implements ResponderInterface {
	public function respond() {
		// if there is any type of error get it's msg and status
		if ($this->response->getStatus() != 200) {
			return response()->json($this->response->getData(), $this->response->getStatus());
		}
		// else return autherized user and token through userResource
		return (new UserResource($this->response->getData()));
	}
}
