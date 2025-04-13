<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('theme.shop', ['products' => $products]);
    }

    public function create()
    {
        return view('theme.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer'
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
            'stock' => $request->stock
        ]);

        return redirect()->route('theme.shop')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit(Product $product)
    {
        return view('theme.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $product->image);
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'stock' => $request->stock
        ]);

        return redirect()->route('theme.shop')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/' . $product->image);
        $product->delete();
        return redirect()->route('theme.shop')->with('success', 'Produit supprimé avec succès.');
    }
} 