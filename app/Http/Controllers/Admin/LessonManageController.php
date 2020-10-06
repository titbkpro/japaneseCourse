<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\StoreRequest;
use App\Http\Services\Admin\LessonManagementService;
use App\Http\Services\Admin\UnitManageService;

class LessonManageController extends Controller
{

    private $lessonService;

    private $unitService;

    /**
     * Create a new controller instance.
     * @param LessonManagementService $lessonService
     */
    public function __construct(LessonManagementService $lessonService, UnitManageService  $unitService)
    {
        $this->lessonService = $lessonService;
        $this->unitService = $unitService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lessons = $this->lessonService->getAllLessons();
        $units = $this->unitService->getAllUnits();

        return view('admin/course-management/lesson-management', [
            'lessons' => $lessons,
            'units' => $units,
        ]);
    }

    public function show($lessonId)
    {
        $lesson = $this->lessonService->getLessonById($lessonId);
        return view('admin/course-management/lesson-management', ['lesson' => $lesson]);
    }

    public function store(StoreRequest $request)
    {
        $this->lessonService->addNewLesson($request->all());
        return  redirect('/admin/lesson-management');
    }

    public function update(StoreRequest $request, $id)
    {
        $this->lessonService->updateLesson($request->all(), $id);
        return  redirect('/admin/lesson-management');
    }

    public function destroy($id)
    {
        $this->lessonService->deleteLesson($id);
        return  redirect('/admin/lesson-management');
    }


    public function exercise($lessonId) {
        dd($lessonId);
        return  redirect('/admin/exercise-management');
    }
}
