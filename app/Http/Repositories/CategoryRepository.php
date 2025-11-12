<?php

namespace App\Http\Repositories;


use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getRootCategories()
    {
        return $this->model->whereNull('parent_id')->get();
    }
}
