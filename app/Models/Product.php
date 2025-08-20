<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name', 'slug', 'description', 'price', 'currency', 'sku', 'stock', 'images','old_price', 'ingredients', 'status',
    ];


    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'images' => 'array',
        'ingredients' => 'array',
    ];


// Relationships
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }




}
