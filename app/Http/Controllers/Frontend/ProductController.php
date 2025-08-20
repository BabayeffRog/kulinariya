<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::with(['products' => function ($q) {
            $q->where('status', '=', 'published')->latest();
        }])->get();

        // aktiv tab: verilən slug və ya birinci kateqoriya
        $activeSlug = $slug ?? ($categories->first()->slug ?? null);

        return view('products.index', compact('categories', 'activeSlug'));
    }

    public function show($slug)
    {
        $product = Product::with('categories')->where('slug', $slug)->firstOrFail();

        // related products: eyni category-lərdən
        $related = Product::whereHas('categories', function($q) use ($product) {
            $q->whereIn('categories.id', $product->categories->pluck('id'));
        })
            ->where('id', '!=', $product->id)
            ->take(8)
            ->get();

        return view('products.show', compact('product','related'));
    }
}
