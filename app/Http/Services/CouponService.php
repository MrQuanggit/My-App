<?php

namespace App\Http\Services;

use App\Http\Repositories\CouponRepository;

class CouponService
{
    protected $couponRepo;

    public function __construct(CouponRepository $couponRepo)
    {
        $this->couponRepo = $couponRepo;
    }

    public function validateCode($code)
    {
        return $this->couponRepo->findByCode($code);
    }
}
