<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model contacts table
 */
class Contact extends BaseModel
{
    use SoftDeletes;

    // status
    const SHOW = 1;
    const NOT_SHOW = 0;

    protected $fillable = [
        'description',
        'contact_detail',
        'status',
    ];
}
