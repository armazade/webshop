<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Inertia\Inertia;

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

        $product = Product::create($validated);

        if ($request->hasFile('image')) {
            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('images', 'public');
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return Inertia::render('Admin/Product/Show', [
            'product' => $product,
            'imageUrl' => $product->getFirstMediaUrl('images'),
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
        $validated = (object)$request->validated();

        $product = ProductService::update($product, $validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }
}
