<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'image_url',
        'published_at',
        'is_published',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'image_url' => 'array'
    ];

    // Auto generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title') && empty($article->getOriginal('slug'))) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    // Scope for published articles
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    // Get route key name
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Get excerpt with fallback to truncated content
    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }
        
        return Str::limit(strip_tags($this->content), 150);
    }

    // Get formatted published date
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('d F Y') : null;
    }

    // Get reading time estimate
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $readingTime = ceil($wordCount / 200); // Average reading speed: 200 words per minute
        return $readingTime;
    }
}