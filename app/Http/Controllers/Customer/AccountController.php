<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('customer.account.index');
    }

    public function update(Request $request)
    {
        // TODO: update profile
        return redirect()->back();
    }
}
