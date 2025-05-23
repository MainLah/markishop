<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->paginate(9);
        $testimonies = DB::table('testimonies')->paginate(5);

        return view('products.index', compact('products', 'testimonies'));
    }
}
