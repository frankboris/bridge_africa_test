<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()->where(['published' => true])->paginate(20);
        return view('index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product_single', compact('product'));
    }
}
