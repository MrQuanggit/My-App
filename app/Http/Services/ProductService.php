<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function listAll()
    {
        return $this->productRepo->getAll();
    }

    public function getActive()
    {
        return $this->productRepo->getActiveProducts();
    }
}
