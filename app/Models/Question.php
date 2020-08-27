<?php

namespace App\Models;

/**
 * Model question table
 */
class Question extends BaseModel
{
    protected $fillable = [
        'question',
        'image_id',
        'audio_id',
        'explain_result',
    ];
}
