<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Log;

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

    public function updateCourse($courseInput, $courseId)
    {
        Log::error("update course", $courseInput);

        $course = Course::find($courseId);
        if($course) {
            $course->update($courseInput);
        } else {
            throw new WebException('update_course_error');
        }
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
        }
    }

    public function getLessonById($lessonId)
    {
        return Lesson::find($lessonId);
    }
}
