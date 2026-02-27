<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'category_id',
        'stock',
        'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getRouteKeyName()
    {
        return 'product_name';
    }
}
