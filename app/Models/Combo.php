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
        'description',
        'sale_off',
        'image_id',
    ];
}
