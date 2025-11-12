<?php

namespace App\Http\Repositories;


use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getActiveProducts()
    {
        return $this->model->where('status', 'active')->get();
    }
}
