<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() { return view('admin.orders.index'); }
    public function show(int $id) { return view('admin.orders.show', compact('id')); }
    public function update(Request $request, int $id) { return redirect()->back(); }
    public function destroy(int $id) { return redirect()->back(); }
}
