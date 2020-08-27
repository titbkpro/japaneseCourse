<?php

namespace App\Models;

/**
 * Model images table
 */
class Image extends BaseModel
{
    protected $fillable = [
        'url',
        'name',
        'description',
    ];
}
