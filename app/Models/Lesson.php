<?php

namespace App\Models;

/**
 * Model lessons table
 */
class Lesson extends BaseModel
{
    protected $fillable = [
        'name',
        'desciption',
        'total_view',
        'video_id',
        'exercise_id',
        'content',
    ];
}
