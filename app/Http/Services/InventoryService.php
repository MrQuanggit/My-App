<?php

namespace App\Http\Services;

use App\Http\Repositories\InventoryRepository;

class InventoryService
{
    protected $inventoryRepo;

    public function __construct(InventoryRepository $inventoryRepo)
    {
        $this->inventoryRepo = $inventoryRepo;
    }

    public function trackProduct($productId)
    {
        return $this->inventoryRepo->getByProduct($productId);
    }
}
