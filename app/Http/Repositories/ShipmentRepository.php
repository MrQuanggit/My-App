<?php

namespace App\Http\Repositories;


use App\Models\Shipment;

class ShipmentRepository extends BaseRepository
{
    public function __construct(Shipment $model)
    {
        parent::__construct($model);
    }
}
