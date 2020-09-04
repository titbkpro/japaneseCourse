<?php

namespace App\Models;

/**
 * Info model
 */
class Info extends BaseModel
{
    protected $fillable = [
        'description',
        'name',
    ];

    /**
     * Get all info details of info
     */
    public function infoDetails()
    {
        return $this->hasMany(InfoDetail::class);
    }
}
