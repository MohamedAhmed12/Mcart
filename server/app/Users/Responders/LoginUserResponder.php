<?php

namespace App\Users\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Users\Domain\Resources\UserResource;

class LoginUserResponder extends Responder implements ResponderInterface
{
    // main responsing function
    public function respond()
    {
        // if there is any type of error get it's msg and status
        if ($this->response->getStatus() != 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }
        // else return autherized user and token through userResource
        return (new UserResource(auth()->user()))
            ->additional([
                // store the response(token) in the token meta
                'meta' => [
                    'token' => $this->response->getData(),
                ],
            ]);
    }
}
