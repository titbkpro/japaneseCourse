<?php

namespace App\Models;

/**
 * Model news_posts table
 */
class NewsPost extends BaseModel
{
    protected $fillable = [
        'description',
        'news_category_id',
        'image_id',
        'title',
        'content',
    ];
}
