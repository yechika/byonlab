<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->take(3)->get();
        
        // Get latest published articles for homepage
        $articles = Article::published()
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();
            
        return view('welcome', compact('products', 'articles'));
    }
    public function productsPage()
    {
        $query = Product::with(['category', 'subcategory']);

        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
        if (request('category')) {
            $query->where('category_id', request('category'));
        }
        if (request('subcategory')) {
            $query->where('subcategory_id', request('subcategory'));
        }

        $products = $query->latest()->paginate(12);

        // Ambil kategori & subkategori untuk filter
        $categories = \App\Models\Category::all();
        $subcategories = \App\Models\Subcategory::all();

        return view('products_page', compact('products', 'categories', 'subcategories'));
    }
    public function show($id)
    {
        $product = \App\Models\Product::with(['category', 'subcategory'])->findOrFail($id);
        return view('product_details', compact('product'));
    }
}
