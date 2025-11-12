<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('customer.cart.index');
    }

    public function add(Request $request, int $productId)
    {
        // TODO: add item to cart
        return redirect()->back();
    }

    public function update(Request $request, int $itemId)
    {
        // TODO: update cart item
        return redirect()->back();
    }

    public function remove(int $itemId)
    {
        // TODO: remove cart item
        return redirect()->back();
    }
}
