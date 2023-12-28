<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pricing' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|json',
            // Add other validation rules as needed
        ]);

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return response()->json($product);
    }

    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pricing' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|json',
            // Add other validation rules as needed
        ]);

        $product->update($data);

        return response()->json($product);
    }

    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}

