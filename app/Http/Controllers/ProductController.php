<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Display a list of products
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login-admin');
        }

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        // Validate only name, price, and stock
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login-admin');
        }

        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login-admin');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }

    
    
}

