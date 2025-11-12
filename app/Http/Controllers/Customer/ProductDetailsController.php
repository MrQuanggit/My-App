<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class ProductDetailsController extends Controller
{
    public function show(int $id)
    {
        return view('customer.product.show', compact('id'));
    }
}
