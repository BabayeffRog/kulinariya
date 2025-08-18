<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title', 'slug', 'image', 'servings',
        'prep_time', 'cook_time', 'calories',
        'difficulty', 'ingredients', 'instructions', 'source_url'
    ];
}
