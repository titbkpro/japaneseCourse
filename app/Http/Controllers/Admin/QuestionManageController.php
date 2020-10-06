<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\QuestionStoreRequest;
use App\Http\Services\Admin\LessonManagementService;
use App\Http\Services\Admin\QuestionManagementService;

class QuestionManageController extends Controller
{

    private $questionService;

    private $lessonService;

    /**
     * Create a new controller instance.
     * @param LessonManagementService $lessonService
     * @param QuestionManagementService $questionService
     */
    public function __construct(LessonManagementService $lessonService, QuestionManagementService  $questionService)
    {
        $this->lessonService = $lessonService;
        $this->questionService = $questionService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = $this->questionService->getAllQuestions();
        return view('admin/course-management/$question-management', [
            'questions' => $questions,
        ]);
    }

    public function show($questionId)
    {
        $question = $this->questionService->getQuestionById($questionId);
        return view('admin/course-management/question-management', ['question' => $question]);
    }

    public function store(QuestionStoreRequest $request)
    {
        $this->questionService->addNewQuestion($request->all());
        return back()->withInput();
    }

    public function update(QuestionStoreRequest $request, $id)
    {
        $this->questionService->updateQuestion($request->all(), $id);
        return back()->withInput();
    }

    public function destroy($id)
    {
        $this->questionService->deleteQuestion($id);
        return back()->withInput();
    }

    public function question($exerciseId) {
        $questions = $this->questionService->getAllQuestionsByExerciseId($exerciseId);

        return view('admin/course-management/question-management', [
            'questions' => $questions,
            'exerciseId' => $exerciseId,
        ]);
    }
}
