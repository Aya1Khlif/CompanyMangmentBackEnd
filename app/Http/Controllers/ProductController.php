<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a list of all products (API)
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    // Show a single product (API)
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    // Store a new product (API)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'card_image' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'status' => 'required|in:' . implode(',', Status::getValues()), // Assuming Status is an enum
        ]);

        $product = Product::create($validatedData);
        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $product
        ], 201);
    }

    // Update an existing product (API)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'card_image' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'status' => 'required|in:' . implode(',', Status::getValues()),
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ], 200);
    }

    // Delete a product (API)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully!'], 200);
    }

}
