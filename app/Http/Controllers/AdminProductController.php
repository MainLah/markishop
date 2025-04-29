<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric',
            'is_available' => 'boolean',
        ]);

        Product::create($request->all());
        return redirect()->route('admin.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric',
            'is_available' => 'boolean',
        ]);

        $product->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Product updated');
    }
}
