<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Exercise\ExerciseStoreRequest;
use App\Http\Requests\Admin\Unit\StoreRequest;
use App\Http\Services\Admin\ExerciseManagementService;
use App\Http\Services\Admin\LessonManagementService;

class ExerciseManageController extends Controller
{

    private $exerciseService;

    private $lessonService;

    /**
     * Create a new controller instance.
     * @param LessonManagementService $lessonService
     * @param ExerciseManagementService $exerciseService
     */
    public function __construct(LessonManagementService $lessonService, ExerciseManagementService  $exerciseService)
    {
        $this->lessonService = $lessonService;
        $this->exerciseService = $exerciseService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exercises = $this->exerciseService->getAllExercises();
        return view('admin/course-management/exercise-management', [
            'exercises' => $exercises,
        ]);
    }

    public function show($exerciseId)
    {
        $exercise = $this->exerciseService->getExerciseById($exerciseId);
        return view('admin/course-management/exercise-management', ['exercise' => $exercise]);
    }

    public function store(ExerciseStoreRequest $request)
    {
        $this->exerciseService->addNewExercise($request->all());
        return back()->withInput();
    }

    public function update(StoreRequest $request, $id)
    {
        $this->exerciseService->updateExercise($request->all(), $id);
        return back()->withInput();
    }

    public function destroy($id)
    {
        $this->exerciseService->deleteExercise($id);
        return back()->withInput();
    }


    public function exercise($lessonId) {
        $exercises = $this->exerciseService->getAllExercisesByLessonId($lessonId);

        return view('admin/course-management/exercise-management', [
            'exercises' => $exercises,
            'lessonId' => $lessonId,
        ]);
    }
}
