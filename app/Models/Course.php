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
        'sale_off',
    ];

    public function units() {
        return $this->belongsToMany(Unit::class, 'course_units', 'course_id', 'unit_id');
    }
}
