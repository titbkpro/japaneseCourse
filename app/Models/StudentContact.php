<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model student_contact table
 */
class StudentContact extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'note',
    ];
}
