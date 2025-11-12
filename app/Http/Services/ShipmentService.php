<?php

namespace App\Http\Services;

use App\Http\Repositories\ShipmentRepository;

class ShipmentService
{
    protected $shipmentRepo;

    public function __construct(ShipmentRepository $shipmentRepo)
    {
        $this->shipmentRepo = $shipmentRepo;
    }
}
