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

    public function parent() {
        return $this->belongsTo(Unit::class, 'parent_unit_id')->with('parent');
    }

    public function children() {
        return $this->hasMany(Unit::class, 'parent_unit_id')->with('children');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_units');
    }

    public function combos() {
        return $this->belongsToMany(Combo::class, 'combo_units');
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}
