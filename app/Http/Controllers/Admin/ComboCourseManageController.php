<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Resources\ComboCourseResource;
use App\Http\Services\Admin\ComboCourseManageService;
use App\Http\Services\Admin\SingleCourseManageService;

class ComboCourseManageController extends Controller
{
    public $comboCourseService;

    public $singleCourseService;

    /**
     * Create a new controller instance.
     *
     * @param ComboCourseManageService $comboCourseService
     * @param SingleCourseManageService $singleCourseService
     */
    public function __construct(ComboCourseManageService $comboCourseService, SingleCourseManageService $singleCourseService)
    {
        $this->comboCourseService = $comboCourseService;
        $this->singleCourseService = $singleCourseService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $combos = $this->comboCourseService->getAllComboCourses();
        $courses = $this->singleCourseService->getAllSingleCourses();
        $courseResources = ComboCourseResource::collection($combos);
        return view('admin/course-management/combo-course-management', [
            'combos' => $courseResources,
            'courses' => $courses,
        ]);
    }

    public function show($comboId)
    {
        $combo = $this->comboCourseService->getComboCourseById($comboId);
        return view('admin/course-management/combo-course-management', ['combo' => $combo]);
    }

    public function store(StoreRequest $request)
    {
        $this->comboCourseService->addNewComboCourse($request->all());
        return  redirect('/admin/combo-course-management');
    }

    public function update(StoreRequest $request, $id)
    {
        $this->comboCourseService->updateComboCourse($request->all(), $id);
        return  redirect('/admin/combo-course-management');
    }

    public function destroy($comboId)
    {
        $this->comboCourseService->deleteComboCourse($comboId);
        return  redirect('/admin/combo-course-management');
    }
}
