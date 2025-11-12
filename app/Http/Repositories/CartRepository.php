<?php

namespace App\Http\Repositories;

use App\Models\Cart;

class CartRepository extends BaseRepository
{
    public function __construct(Cart $model)
    {
        parent::__construct($model);
    }

    public function findByUser($userId)
    {
        return $this->model->where('user_id', $userId)->first();
    }
}
