<?php

namespace App\Models;

/**
 * Model payment_infos table
 */
class PaymentInfo extends BaseModel
{
    protected $fillable = [
        'name',
        'content',
        'status',
    ];
}
