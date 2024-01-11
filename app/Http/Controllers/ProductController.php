<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function /*getProducts*/index()
    {
        $products = Product::orderBy('name')->take(10)->get();
        return $products;
    }
    
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id'); // Add this line
        $product->save();
    
        return "Product created successfully";
    }
    
    // public function getProduct($productId){
    //     $product = Product::find($productId);
    //     if (!$product) {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    //     return response()->json(['data' => $product]);
    // }
    // public function updateProduct(Request $request, $productId)
    // {
    //     $product = Product::find($productId);
    //     if (!$product) {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    //     $product->name = $request->input('name');
    //     // Update other fields as needed
    //     $product->save();
    //     return response()->json(['message' => 'Product updated successfully']);
    // }

    // public function deleteProduct($productId)
    // {
    //     $product = Product::find($productId);
    //     if (!$product) {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    //     $product->delete();
    //     return response()->json(['message' => 'Product deleted successfully']);
    // }
}

