<?php

namespace App\Stocks\Actions;

use App\Stocks\Domain\Services\Service;
use App\Stocks\Responders\Responder;

class Action 
{
    public function __construct(Responder $responder, Service $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke() 
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}