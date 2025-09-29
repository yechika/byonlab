<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_url',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scope for active heroes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered heroes
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
