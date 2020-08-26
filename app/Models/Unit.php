<?php

namespace App\Models;

/**
 * Model units table
 */
class Unit extends BaseModel
{
    protected $fillable = [
        'parent_unit_id',
        'name',
    ];
}
