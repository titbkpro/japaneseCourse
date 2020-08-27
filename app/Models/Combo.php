<?php

namespace App\Models;

/**
 * Model combos table
 */
class Combo extends BaseModel
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
