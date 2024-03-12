<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View {
        $categories = Category::all();
        return view('category.index', [
            'categories'=> $categories,
        ]);
    }
    public function create(): View {
        return view('category.create');
    }
    public function store(Request $request): RedirectResponse {
        $data = $request->validate([
            'name' => 'required|max:255|string',
        ]);
        Category::create($data);
        return redirect()->route('category.index');
    }
    public function edit(Category $category): View {
        return view('category.edit', ['category'=> $category]);
    }

    public function update(Category $category, Request $request): RedirectResponse {
        $data = $request->validate([
            'name' => 'required|max:255|string',
        ]);
        $category->update($data);
        return redirect()->route('category.index');
    }
    public function destroy(Category $category): RedirectResponse {
        $category->delete();
        return back();
    }
}
