<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index()
    {
        // Kateqoriyalar + hər birindən ən yeni 8 resept (şəkil+slug lazımdır)
        $categories = Category::all();

        // İlk tab aktiv olsun deyə ilk kateqoriyanın slug-ını ötürürük
        $activeSlug = optional($categories->first())->slug;

        return view('recipes.index', compact('categories', 'activeSlug'));
    }

    public function show($slug)
    {
        $recipe = Recipe::with('categories')->where('slug', $slug)->firstOrFail();
        $recipe->incrementViews();

        // şəkil qaytarıcı helper
        $imageUrl = function (?string $path): ?string {
            if (!$path) return null;
            return Str::startsWith($path, ['http://','https://']) ? $path : Storage::url($path);
        };

        // əsas şəkil + qalereya
        $cover = $imageUrl($recipe->image)
            ?: ($recipe->media[0] ?? null ? $imageUrl($recipe->media[0]) : null);
        $gallery = collect($recipe->media ?? [])->map($imageUrl)->filter()->values();

        // prev/next (id-ə görə sadə naviqasiya)
        $prev = Recipe::where('id', '<', $recipe->id)->latest('id')->first(['id','slug','title','image']);
        $next = Recipe::where('id', '>', $recipe->id)->oldest('id')->first(['id','slug','title','image']);

        // sidebar: kateqoriyalar + say
        $categories = Category::withCount('recipes')->orderBy('name')->get();

        // sidebar: son reseptlər
        $recent = Recipe::latest()->take(3)->get(['id','slug','title','image','created_at']);

        // sidebar: tag cloud (JSON 'tags' massivlərindən)
        $tags = Recipe::query()
            ->whereNotNull('tags')
            ->pluck('tags')        // Collection<array>
            ->flatten()
            ->filter(fn($t)=>filled($t))
            ->unique()
            ->take(30)
            ->values();

        return view('recipes.show', compact(
            'recipe','cover','gallery','prev','next','categories','recent','tags'
        ));

    }
}
