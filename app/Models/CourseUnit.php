<?php

namespace App\Models;

/**
 * Model course_units table
 */
class CourseUnit extends BaseModel
{
    protected $fillable = [
        'course_id',
        'unit_id',
    ];
}
