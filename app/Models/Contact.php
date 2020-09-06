<?php

namespace App\Models;

/**
 * Model contacts table
 */
class Contact extends BaseModel
{
    // status
    const SHOW = 1;
    const NOT_SHOW = 0;

    protected $fillable = [
        'description',
        'contact_detail',
        'status',
    ];
}
