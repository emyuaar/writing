<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'short_description',
        'description',
        'features',
        'image',
        'banner_image',
        'is_featured',
        'is_published',
        'sort_order',
        'seo_metadata',
    ];

    protected $casts = [
        'features' => 'array',
        'seo_metadata' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
