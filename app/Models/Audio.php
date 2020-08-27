<?php

namespace App\Models;

/**
 * Model audios table
 */
class Audio extends BaseModel
{
    protected $fillable = [
        'url',
        'name',
        'description',
    ];
}
