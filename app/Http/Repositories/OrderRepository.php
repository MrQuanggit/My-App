<?php

namespace App\Http\Repositories;


use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function getByUser($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
}
