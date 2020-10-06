<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Lesson;

class LessonManagementService extends BaseService
{
    public function getAllLessons()
    {
        return Lesson::all();
    }

    public function getLessonById($lessonId)
    {
        return Lesson::find($lessonId);
    }

    public function addNewLesson($lessonInput)
    {
        return Lesson::create($lessonInput);
    }

    public function updateLesson($lessonInput, $lessonId)
    {
        $lesson = Lesson::find($lessonId);
        if($lesson) {
            $lesson->update($lessonInput);
        } else {
            throw new WebException('update_lesson_error');
        }
    }

    public function deleteLesson($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        if ($lesson) {
            $lesson->delete();
        } else {
            throw new WebException('delete_lesson_error');
        }
    }
}
