<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'servings',
        'prep_time',
        'cook_time',
        'calories',
        'difficulty',
        'instructions',
        'ingredients',
        'categories',
        'tags',
        'media',
        'author',
        'meta_title',
        'meta_description',
        'views_count',
    ];

    protected $casts = [
        'servings'    => 'integer',
        'calories'    => 'integer',
        'ingredients' => 'array',
        'tags'        => 'array',
        'media'       => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * Views artırmaq üçün helper.
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    /**
     * Axtarış skopu (başlıq + təlimat + ingredient).
     */
    public function scopeSearch($query, string $term)
    {
        $term = trim($term);

        return $query->where('title', 'like', "%{$term}%")
            ->orWhere('instructions', 'like', "%{$term}%")
            ->orWhereJsonContains('ingredients', $term)
            ->orWhereJsonContains('categories', $term);
    }
}
