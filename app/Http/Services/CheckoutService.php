<?php

namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\CartRepository;
use App\Http\Repositories\PaymentRepository;

class CheckoutService
{
    public function __construct(
        protected OrderRepository $orderRepo,
        protected CartRepository $cartRepo,
        protected PaymentRepository $paymentRepo
    ) {}

    public function processCheckout($userId, array $data)
    {
        // TODO: create order, link cart, create payment, etc.
    }
}
