<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
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

        $data = $request->all();
        $data['is_available'] = $request->has('is_available') ? true : false;

        $product->update($data);
        return redirect()->route('admin.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.index')->with("success", "Product deleted");
    }
}
