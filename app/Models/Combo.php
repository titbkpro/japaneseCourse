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

    /**
     * Relationship many to many with course model
     *
     * @return BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_combos');
    }
}
