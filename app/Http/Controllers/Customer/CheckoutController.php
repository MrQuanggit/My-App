<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('customer.checkout.index');
    }

    public function placeOrder(Request $request)
    {
        // TODO: handle checkout and place order
        return redirect()->route('customer.orders');
    }
}
