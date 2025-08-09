<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public static function update(Product $product, object $data): Product
    {
        $product->update([
            'name' => $data->name,
            'description' => $data->description ?? null,
            'price' => $data->price ?? 0,
            'is_active' => $data->is_active ?? false,
        ]);

        if (isset($data->image)) {
            $product->clearMediaCollection('images');
            $product->addMedia($data->image)->toMediaCollection('images');
        }

        return $product;
    }
}
