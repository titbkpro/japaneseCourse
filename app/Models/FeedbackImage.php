<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model feedback_images table
 */
class FeedbackImage extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(DataFile::class, 'image_id');
    }
}
