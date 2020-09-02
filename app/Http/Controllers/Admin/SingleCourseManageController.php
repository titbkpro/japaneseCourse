<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Services\Admin\SingleCourseManageService;

class SingleCourseManageController extends Controller
{
    public $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new SingleCourseManageService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = $this->service->getAllSingleCourses();
        return view('admin/course-management/single-course-management', ['courses' => $courses]);
    }

    public function show($courseId)
    {
        $course = $this->service->getSingleCourseById($courseId);
        return view('admin/single-course-management', ['course' => $course]);
    }

    public function store(StoreRequest $request)
    {
        $this->service->addNewSingleCourse($request->all());
        return  redirect('/admin/single-course-management');
    }

    public function update(StoreRequest $request, $id)
    {
        $this->service->updateSingleCourse($request->all(), $id);
        return  redirect('/admin/single-course-management');
    }

    public function destroy($courseId)
    {
        $this->service->deleteSingleCourse($courseId);
        return  redirect('/admin/single-course-management');
    }
}
