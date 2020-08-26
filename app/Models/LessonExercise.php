<?php

namespace App\Models;

/**
 * Model lesson_excercises table
 */
class LessonExercise extends BaseModel
{
    protected $fillable = [
        'lession_id',
        'exercise_id',
    ];
}
