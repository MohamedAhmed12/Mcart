<?php

namespace App\Orders\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Orders\Domain\Repositories\OrderRepository;
class Service extends Service 
{
    protected $orders;
    public function __construct(OrderRepository $orders) 
    {
        $this->orders = $orders;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->orders->all());
    }
}