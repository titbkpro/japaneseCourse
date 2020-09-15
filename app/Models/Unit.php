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
}
