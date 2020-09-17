<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model images table
 */
class DataFile extends BaseModel
{
    use SoftDeletes;
    
    const IMAGE = 1;
    const VIDEO = 2;
    const AUDIO = 3;

    protected $fillable = [
        'url',
        'name',
        'description',
        'type',
    ];
}
