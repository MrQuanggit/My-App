<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('customer.shop.index');
    }

    public function category(string $slug)
    {
        return view('customer.shop.category', compact('slug'));
    }
}
