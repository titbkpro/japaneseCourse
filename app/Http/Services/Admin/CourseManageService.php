<?php

namespace App\Http\Services\Admin;

use App\Models\Course;

class CourseManageService extends BaseService
{
    public function getAllCousre()
    {
        return Course::all();
    }
}
