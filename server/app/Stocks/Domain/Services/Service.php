<?php

namespace App\Stocks\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Stocks\Domain\Repositories\StockRepository;
class Service extends Service 
{
    protected $stocks;
    public function __construct(StockRepository $stocks) 
    {
        $this->stocks = $stocks;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->stocks->all());
    }
}