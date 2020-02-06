<?php

namespace App\Orders\Domain\Repositories;
use Order;

class OrderRepository extends Repository
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }
}
