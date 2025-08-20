<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        $recipes = Recipe::query()
            ->latest('created_at')
            ->select('id','slug','title','image','author','created_at')
            ->take(12)
            ->get();
        $products = Product::query()
            ->where('stock', '>', 1)
            ->where('status', 'published')
            ->latest()
            ->take(8)                        // neçə dənə göstərmək istədiyini seç
            ->get();

        $drinks = Category::where('slug', 'ickiler')
            ->with(['children.products' => function($q) {
                $q->where('status', 1);
            }])
            ->first();

        return view('welcome', compact('categories','recipes','products','drinks'));


    }

    public function about()
    {
        return view('about');
    }
}
