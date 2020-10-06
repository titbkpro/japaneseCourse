<?php

namespace App\Models;

/**
 * Model exercise_detail_questions table
 */
class ExerciseQuestion extends BaseModel
{
    protected $fillable = [
        'exercise_id',
        'question_id',
    ];
}
