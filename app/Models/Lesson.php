<?php

namespace App\Models;

/**
 * Model lessons table
 */
class Lesson extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'total_view',
        'video_id',
        'unit_id',
        'content',
    ];

    public function exercises() {
        return $this->hasMany(Exercise::class);
    }
}
