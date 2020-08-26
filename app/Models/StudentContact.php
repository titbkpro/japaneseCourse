<?php

namespace App\Models;

/**
 * Model student_contact table
 */
class StudentContact extends BaseModel
{
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'note',
    ];
}
