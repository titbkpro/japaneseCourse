<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Answer\AnswerStoreRequest;
use App\Http\Services\Admin\AnswerManagementService;
use App\Http\Services\Admin\QuestionManagementService;

class AnswerManageController extends Controller
{

    private $answerService;

    private $questionService;

    /**
     * Create a new controller instance.
     * @param AnswerManagementService $answerService
     * @param QuestionManagementService $questionService
     */
    public function __construct(AnswerManagementService $answerService, QuestionManagementService $questionService)
    {
        $this->answerService = $answerService;
        $this->questionService = $questionService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $answers = $this->answerService->getAllAnswers();
        return view('admin/course-management/answer-management', [
            'answers' => $answers,
        ]);
    }

    public function show($answerId)
    {
        $answer = $this->answerService->getAnswerById($answerId);
        return view('admin/course-management/answer-management', ['answer' => $answer]);
    }

    public function store(AnswerStoreRequest $request)
    {
        $this->answerService->addNewAnswer($request->all());
        return back()->withInput();
    }

    public function update(AnswerStoreRequest $request, $id)
    {
        $this->answerService->updateAnswer($request->all(), $id);
        return back()->withInput();
    }

    public function destroy($id)
    {
        $this->answerService->deleteAnswer($id);
        return back()->withInput();
    }


    public function answer($questionId) {
        $answers = $this->answerService->getAllAnswersByQuestionId($questionId);

        return view('admin/course-management/answer-management', [
            'answers' => $answers,
            'questionId' => $questionId,
        ]);
    }
}
