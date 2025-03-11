<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(3);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480', // Video validation
        ]);

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $videoPath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480',
        ]);

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
            $product->update(['video' => $videoPath]);
        }

        $product->update($request->only(['title', 'description']));

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
