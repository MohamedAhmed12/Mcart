<?php

namespace App\Stocks\Domain\Repositories;
use Stock;

class StockRepository extends Repository
{
    protected $model;

    public function __construct(Stock $model)
    {
        $this->model = $model;
    }
}
