<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model news_posts table
 */
class NewsPost extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'news_category_id',
        'image_id',
        'title',
        'content',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
