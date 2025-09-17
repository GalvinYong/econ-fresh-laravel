<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCatalogController extends Controller
{
    public function index()
{
    $products = Product::with('category')
        ->where('in_stock', true)
        ->orderBy('name')
      ->paginate(10); // ← This returns a Paginator
      
    $categories = \App\Models\Category::withCount('products')->get();

    return view('products.catalog', compact('products', 'categories'));
}

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        // 404 handling for missing items
        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('products.show', compact('product'));
    }
}