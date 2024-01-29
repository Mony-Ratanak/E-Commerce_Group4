<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();

        return response()->json(['categories' => $categories], 200);
    }
    public function createCategory(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new category
        $category = Category::create([
            'name' => $request->input('name'),
            // Add more fields as needed
        ]);

        // Return a success response with the created category
        return response()->json(['category' => $category], 201);
    }
    public function updateCategory(Request $request, $categoryId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        try {
            // Find the category by ID
            $category = Category::findOrFail($categoryId);

            // Update the category attributes
            $category->update([
                'name' => $request->input('name'),
                // Add other fields you want to update
            ]);

            // Return a success response
            return response()->json(['message' => 'Category updated successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update
            return response()->json(['error' => 'Failed to update category'], 500);
        }
    }
    public function deleteCategory($categoryId)
    {
        // Find the category by ID
        $category = Category::find($categoryId);

        // If the category doesn't exist, return a not found response
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Delete the category
        $category->delete();

        // Return a success response
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
    public function getcategorybyid(Request $request)
    {
        $Id = $request->input('id');
        $categories = Category::where('id', $Id)->get();
        return $categories;
    }
}

