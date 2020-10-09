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

    public function exercises() {
        return $this->belongsToMany(Exercise::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
