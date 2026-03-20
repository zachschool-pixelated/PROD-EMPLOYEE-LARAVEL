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
        Product::create([
            'name' => $request->input('name123'),
            'price' => $request->input('price123')
        ]);
        return redirect('/products');
    }
}