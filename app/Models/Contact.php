<?php

namespace App\Models;

/**
 * Model contacts table
 */
class Contact extends BaseModel
{
    protected $fillable = [
        'description',
        'contact_detail',
    ];
}
