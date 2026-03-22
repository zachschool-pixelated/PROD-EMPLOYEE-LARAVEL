<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // DISPLAY ALL PRODUCTS
    public function index()
    {
        $products = Product::all();
        
        return view('products.index', ["items" => $products
        ]); //items reference products and hold the data
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name123' => 'required|string|max:255',
            'price123' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $validated['name123'],
            'price' => $validated['price123']
        ]);
        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name123' => 'required|string|max:255',
            'price123' => 'required|numeric|min:0',
        ]);

        $product->update([
            'name' => $validated['name123'],
            'price' => $validated['price123'],
        ]);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}