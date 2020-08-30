<?php

namespace App\Models;

/**
 * Model info_details table
 */
class InfoDetail extends BaseModel
{
    protected $fillable = [
        'info_id',
        'title',
        'content',
        'status',
    ];

    public function info()
    {
        return $this->belongsTo(Info::class);
    }
}
