<?php

namespace App\Models;

/**
 * Model exercises table
 */
class Exercise extends BaseModel
{
    protected $fillable = [
        'lesson_id',
        'name',
        'content',
    ];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class, 'exercise_question', 'exercise_id', 'question_id');
    }
}
