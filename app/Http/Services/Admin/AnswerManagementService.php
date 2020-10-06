<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Answer;
use App\Models\Question;

class AnswerManagementService extends BaseService
{
    public function getAllAnswers()
    {
        return Answer::all();
    }

    public function getAllAnswersByQuestionId($questionId)
    {
        $question = Question::find($questionId);
        return $question->answers;
    }

    public function getAnswerById($answerId)
    {
        return Answer::find($answerId);
    }

    public function addNewAnswer($answerInput)
    {
        return Answer::create($answerInput);
    }

    public function updateAnswer($answerInput, $answerId)
    {
        $answer = Answer::find($answerId);
        if($answer) {
            $answer->update($answerInput);
        } else {
            throw new WebException('update_answer_error');
        }
    }

    public function deleteAnswer($answerId)
    {
        $answer = Answer::findOrFail($answerId);
        if ($answer) {
            $answer->delete();
        } else {
            throw new WebException('delete_answer_error');
        }
    }
}
