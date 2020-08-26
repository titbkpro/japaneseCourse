<?php

namespace App\Models;

/**
 * Model courses table
 */
class Course extends BaseModel
{
    protected $fillable = [
        'name',
        'time',
        'fee',
        'image_id',
        'description',
        'sale off',
    ];
}
