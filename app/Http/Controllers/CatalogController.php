<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        return view('catalog.index', compact('products'))->with([
            'paginationView' => 'vendor.pagination.default',
        ]);
    }
}
