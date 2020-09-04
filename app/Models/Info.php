<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Info model
 */
class Info extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'name',
    ];

    /**
     * Get all info details of info
     */
    public function infoDetails()
    {
        return $this->hasMany(InfoDetail::class);
    }
}
