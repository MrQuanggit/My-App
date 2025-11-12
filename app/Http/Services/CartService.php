<?php

namespace App\Http\Services;

use App\Http\Repositories\CartRepository;

class CartService
{
    protected $cartRepo;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function getUserCart($userId)
    {
        return $this->cartRepo->findByUser($userId);
    }
}
