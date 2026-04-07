<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('products')->orderBy('name')->get();

        return view('categories.index', ['items' => $categories]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_name123' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $validated['category_name123'],
        ]);

        return redirect('/categories');
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'category_name123' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $validated['category_name123'],
        ]);

        return redirect('/categories');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->products()->exists()) {
            return redirect('/categories')->with('error', 'Category cannot be deleted because products are still assigned to it.');
        }

        $category->delete();

        return redirect('/categories');
    }
}
