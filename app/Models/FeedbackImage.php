<?php

namespace App\Models;

/**
 * Model feedback_images table
 */
class FeedbackImage extends BaseModel
{
    protected $fillable = [
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(DataFile::class, 'image_id');
    }
}
