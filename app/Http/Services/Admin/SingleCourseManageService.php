<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Course;

class SingleCourseManageService extends BaseService
{
    public function getAllSingleCourses()
    {
        return Course::all();
    }

    public function getSingleCourseById($courseId)
    {
        return Course::find($courseId);
    }

    public function addNewSingleCourse($courseInput)
    {
        Course::create($courseInput);
    }

    public function updateSingleCourse($courseInput, $courseId)
    {
        $course = Course::find($courseId);
        if($course) {
            $course->update($courseInput);
        } else {
            throw new WebException('update_course_error');
        }
    }

    public function deleteSingleCourse($id)
    {
        $course = Course::findOrFail($id);
        if ($course) {
            $course->delete();
        } else {
            throw new WebException('delete_single_course_error');
        }
    }
}
