<?php

namespace App\Http\Services\Admin;

use App\Models\Course;

class CourseManageService extends BaseService
{
    public function getAllCourses()
    {
        return Course::all();
    }

    public function getCourseById($courseId)
    {
        return Course::find($courseId);
    }

    public function addNewCourse($courseInput)
    {
        Course::create($courseInput);
    }

    public function updateCourse($courseInput)
    {
        $course = Course::find($courseInput->id);
        if($course) {
            Course::update($courseInput);
        }
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
        }
    }
}
