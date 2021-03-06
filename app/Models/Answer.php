<?php

namespace App\Models;

/**
 * Model answers table
 */
class Answer extends BaseModel
{
    protected $fillable = [
        'question_id',
        'answer',
        'is_right_answer',
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
