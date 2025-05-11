<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProduktController extends Controller
{
    public function show(Product $product)
    {
        $novinky = Product::where('group_id', 2)
            ->latest()
            ->take(4)
            ->get();

        $sizes = [
            'S'  => $product->has_s,
            'M'  => $product->has_m,
            'L'  => $product->has_l,
            'XL' => $product->has_xl,
        ];

        $product->load(['mainPhoto', 'photos', 'brand', 'type']);

        return view('pages.product_description', compact('product', 'novinky', 'sizes'));
    }
}
