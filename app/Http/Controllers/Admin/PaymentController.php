<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() { return view('admin.payments.index'); }
    public function show(int $id) { return view('admin.payments.show', compact('id')); }
    public function refund(Request $request, int $id) { return redirect()->back(); }
}
