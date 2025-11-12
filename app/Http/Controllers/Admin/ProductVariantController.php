<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index()
    {
        return view('admin.variants.index');
    }

    public function create()
    {
        return view('admin.variants.create');
    }

    public function store(Request $request)
    {
        // TODO: create variant
        return redirect()->back();
    }

    public function edit(int $id)
    {
        return view('admin.variants.edit', compact('id'));
    }

    public function update(Request $request, int $id)
    {
        // TODO: update variant
        return redirect()->back();
    }

    public function destroy(int $id)
    {
        // TODO: delete variant
        return redirect()->back();
    }
}
