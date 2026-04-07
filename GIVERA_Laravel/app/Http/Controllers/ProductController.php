<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // DISPLAY ALL PRODUCTS
    public function index(): View
    {
        $products = Product::with('category')->get();
        $categories = Category::orderBy('name')->get();
        
        return view('products.index', [
            "items" => $products,
            'categories' => $categories,
        ]); //items reference products and hold the data
    }

    public function store(Request $request): RedirectResponse
    {
        if (!Category::exists()) {
            return redirect('/products')->with('error', 'Add at least one category before creating products.');
        }

        $validated = $request->validate([
            'name123' => 'required|string|max:255',
            'price123' => 'required|numeric|min:0',
            'category_id123' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $validated['name123'],
            'price' => $validated['price123'],
            'category_id' => $validated['category_id123'],
        ]);
        return redirect('/products');
    }

    public function edit(Product $product): View
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name123' => 'required|string|max:255',
            'price123' => 'required|numeric|min:0',
            'category_id123' => 'required|exists:categories,id',
        ]);

        $product->update([
            'name' => $validated['name123'],
            'price' => $validated['price123'],
            'category_id' => $validated['category_id123'],
        ]);

        return redirect('/products');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect('/products');
    }
}