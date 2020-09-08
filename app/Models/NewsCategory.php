<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model new_categories table
 */
class NewsCategory extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'name',
    ];

    /**
     * Get all news post of category
     */
    public function newsPosts()
    {
        return $this->hasMany(NewsPost::class);
    }
}
