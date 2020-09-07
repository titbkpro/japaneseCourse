<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model info_details table
 */
class InfoDetail extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'info_id',
        'title',
        'content',
        'status',
    ];

    public function info()
    {
        return $this->belongsTo(Info::class);
    }
}
