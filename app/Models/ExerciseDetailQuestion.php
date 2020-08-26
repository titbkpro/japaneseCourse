<?php

namespace App\Models;

/**
 * Model exercise_detail_questions table
 */
class ExerciseDetailQuestion extends BaseModel
{
    protected $fillable = [
        'exercise_detail_id',
        'question_id',
    ];
}
