<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() { return view('admin.categories.index'); }
    public function create() { return view('admin.categories.create'); }
    public function store(Request $request) { return redirect()->back(); }
    public function edit(int $id) { return view('admin.categories.edit', compact('id')); }
    public function update(Request $request, int $id) { return redirect()->back(); }
    public function destroy(int $id) { return redirect()->back(); }
}
