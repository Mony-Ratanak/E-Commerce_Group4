<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $category = Category::create($data);

        return response()->json($category, 201);
    }

    public function show($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return response()->json($category);
    }

    public function update(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $category->update($data);

        return response()->json($category);
    }

    public function destroy($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }

    public function getProducts($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = $category->products; // Assuming a relationship exists between Category and Product models

        return response()->json($products);
    }
}

