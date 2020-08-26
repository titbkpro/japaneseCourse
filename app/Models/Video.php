<?php

namespace App\Models;

/**
 * Model videos table
 */
class Video extends BaseModel
{
    protected $fillable = [
        'url',
        'name',
        'description',
    ];
}
