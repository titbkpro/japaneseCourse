<?php

namespace App\Models;

/**
 * Model question_answers table
 */
class QuestionAnswer extends BaseModel
{
    protected $fillable = [
        'question_id',
        'answer_id',
        'is_right_answer',
    ];
}
