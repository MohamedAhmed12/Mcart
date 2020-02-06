<?php

namespace App\Users\Actions;

use App\Users\Responders\RegisterUserResponder;
use App\Users\Domain\Services\RegisterUserService;
use App\Users\Domain\Requests\RegisterUserFormRequest;

class RegisterUserAction
{
    public function __construct(RegisterUserResponder $responder, RegisterUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(RegisterUserFormRequest $request)
    {
        dd(1);
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
