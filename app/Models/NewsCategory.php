<?php

namespace App\Models;

/**
 * Model new_categories table
 */
class NewsCategory extends BaseModel
{
    protected $fillable = [
        'description',
        'name',
    ];
}
