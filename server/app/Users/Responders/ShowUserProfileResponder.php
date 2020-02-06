<?php

namespace App\Users\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class ShowUserProfileResponder extends Responder implements ResponderInterface {
	public function respond() {
		return $this->response->getData();
	}
}
