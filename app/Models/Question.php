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

    public function audio() {
        return $this->belongsTo(DataFile::class, 'audio_id');
    }

    public function image() {
        return $this->belongsTo(DataFile::class, 'image_id');
    }
}
