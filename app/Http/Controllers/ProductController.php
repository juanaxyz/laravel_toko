<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->search;


        $products = Product::when($search, fn($query, $search) => $query->where('product_name', 'like', "%{$search}%"))->get();
        // dd($data);
        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        // function untuk menampilkan form create product
        return view('pages.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Upload file ke storage/app/public/image_products
        $imagePath = $request->file('image')
            ->store('image_products', 'public');

        $validated['image_path'] = $imagePath;

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('message', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // function untuk menampilkan detail product
        return view('pages.product.detail', compact('product'));
        dd($product->category->category_name);
        // $data = Product::findOrFail($product->product_name);
        // dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::get();

        return view('pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
        return redirect('/products')->with('message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        // dd('delete');
        $product->delete();
        return redirect('/products')->with('message', 'Product deleted successfully.');
    }
}
