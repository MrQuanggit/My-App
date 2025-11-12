<?php

namespace App\Http\Services;

use App\Http\Repositories\PaymentRepository;

class PaymentService
{
    protected $paymentRepo;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepo = $paymentRepo;
    }

    public function createPayment(array $data)
    {
        return $this->paymentRepo->create($data);
    }
}
