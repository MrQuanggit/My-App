<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index() { return view('admin.shipments.index'); }
    public function show(int $id) { return view('admin.shipments.show', compact('id')); }
    public function update(Request $request, int $id) { return redirect()->back(); }
}
