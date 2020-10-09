<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Exercise;
use App\Models\Lesson;

class ExerciseManagementService extends BaseService
{
    public function getAllExercises()
    {
        return Exercise::all();
    }

    public function getAllExercisesByLessonId($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        return $lesson->exercises;
    }

    public function getExerciseById($exerciseId)
    {
        return Exercise::find($exerciseId);
    }

    public function addNewExercise($exerciseInput)
    {
        return Exercise::create($exerciseInput);
    }

    public function updateExercise($exerciseInput, $exerciseId)
    {
        $exercise = Exercise::find($exerciseId);
        if($exercise) {
            $exercise->update($exerciseInput);
        } else {
            throw new WebException('update_exercise_error');
        }
    }

    public function deleteExercise($exerciseId)
    {
        $exercise = Exercise::findOrFail($exerciseId);
        if ($exercise) {
            $exercise->delete();
        } else {
            throw new WebException('delete_exercise_error');
        }
    }
}
