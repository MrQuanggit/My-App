<?php

namespace App\Http\Repositories;


use App\Models\Coupon;

class CouponRepository extends BaseRepository
{
    public function __construct(Coupon $model)
    {
        parent::__construct($model);
    }

    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }
}
