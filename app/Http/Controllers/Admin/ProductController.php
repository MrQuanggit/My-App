<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // TODO: validate and create product
        return redirect()->back();
    }

    public function edit(int $id)
    {
        return view('admin.products.edit', compact('id'));
    }

    public function update(Request $request, int $id)
    {
        // TODO: validate and update product
        return redirect()->back();
    }

    public function destroy(int $id)
    {
        // TODO: delete product
        return redirect()->back();
    }
}
