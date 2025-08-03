<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'imageUrl' => $product->getFirstMediaUrl('images'),
            ];
        });

        return Inertia::render('Product/Index', [
            'products' => $products,
        ]);
    }


    public function show(Product $product)
    {
        return Inertia::render('Product/Show', [
            'product' => $product,
            'imageUrl' => $product->getFirstMediaUrl('images')
        ]);
    }
}
