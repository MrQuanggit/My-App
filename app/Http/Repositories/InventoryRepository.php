<?php

namespace App\Http\Repositories;


use App\Models\InventoryMovement;

class InventoryRepository extends BaseRepository
{
    public function __construct(InventoryMovement $model)
    {
        parent::__construct($model);
    }

    public function getByProduct($productId)
    {
        return $this->model->where('product_id', $productId)->get();
    }
}
