<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Admin/Product/Index', [
            'products' => $products, 
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Product/Create');
    }

    public function store(ProductUpdateRequest $request)
    {
        $validated = $request->validated();

        Product::create($request->validated());

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return Inertia::render('Admin/Product/Show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return Inertia::render('Admin/Product/Edit', [
            'product' => $product,
        ]);
    }
    
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update(attributes: $validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
}
