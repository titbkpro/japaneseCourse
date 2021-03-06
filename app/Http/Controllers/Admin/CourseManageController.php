<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Http\Services\Admin\CourseManageService;
use Illuminate\Support\Facades\Log;

class CourseManageController extends Controller
{
    public $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new CourseManageService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = $this->service->getAllCourses();
        return view('admin/course-management/single-course-management', compact('courses'));
    }

    public function show($courseId)
    {
        $course = $this->service->getCourseById($courseId);
        return view('admin/course-management/single-course-management', ['$course' => $course]);
    }

    public function store(StoreRequest $request)
    {
        $this->service->addNewCourse($request->all());
        return  redirect('/admin/course-manage');
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->service->updateCourse($request->all(), $id);
        return  redirect('/admin/course-manage');
    }

    public function destroy($courseId)
    {
        $this->service->deleteCourse($courseId);
        return  redirect()->route('index');
    }
}
