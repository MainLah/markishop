<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Testimony;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $testimonies = Testimony::all();

        return view('products.index', compact('products', 'testimonies'));
    }
}
