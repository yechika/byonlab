<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'attributes',
        'category_id',
        'subcategory_id',
        'image_url',
        'price',
        'stock',
        'target_link',
    ];

    protected $casts = [
        'attributes' => 'array',
        'image_url' => 'array', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
