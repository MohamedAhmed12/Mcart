<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\CreateUserFormRequest;
use App\Users\Domain\Services\CreateUserService;
use App\Users\Responders\CreateUserResponder;

class CreateUserAction
{
    public function __construct(CreateUserResponder $responder, CreateUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(CreateUserFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
