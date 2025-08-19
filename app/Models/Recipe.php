<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'ingredients',
        'instructions',
        'servings',
        'prep_time',
        'cook_time',
        'calories',
    ];
}
