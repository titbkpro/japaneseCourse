<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Exercise;
use App\Models\Question;

class QuestionManagementService extends BaseService
{
    public function getAllQuestions()
    {
        return Question::all();
    }

    public function getAllQuestionsByExerciseId($exerciseId)
    {
        $exercise = Exercise::find($exerciseId);
        return $exercise->questions;
    }

    public function getQuestionById($questionId)
    {
        return Question::find($questionId);
    }

    public function addNewQuestion($questionInput)
    {
        $question = Question::create($questionInput);
        $exercises = Exercise::find($questionInput['exercise_id']);
        $question->exercises()->attach($exercises);
    }

    public function updateQuestion($questionInput, $questionId)
    {
        $question = Question::find($questionId);
        if($question) {
            $question->update($questionInput);
        } else {
            throw new WebException('update_question_error');
        }
    }

    public function deleteQuestion($questionId)
    {
        $question = Question::findOrFail($questionId);
        if ($question) {
            $question->delete();
        } else {
            throw new WebException('delete_question_error');
        }
    }
}
