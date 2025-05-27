<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->paginate(12);
        return view('welcome', compact('products'));
    }
    public function productsPage()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->paginate(12);
        return view('products_page', compact('products'));
    }
}