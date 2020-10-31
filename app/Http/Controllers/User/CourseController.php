<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Services\Admin\CourseManageService;
use App\Http\Services\Admin\ComboCourseManageService;

class CourseController extends BaseController
{
    var $courseService;
    var $comboCourseService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseManageService $courseService, ComboCourseManageService $comboCourseService)
    {
        //$this->middleware('auth');
        parent::__construct();
        $this->courseService = $courseService;
        $this->comboCourseService = $comboCourseService;
    }

    public function course()
    {
        return view('course');
    }

    public function singleCourse()
    {
        $singleCourses = $this->courseService->getAllCourses();
        return view('single-course', ['courses' => $singleCourses]);
    }

    public function comboCourse()
    {
        $comboCourses = $this->comboCourseService->getAllComboCourses();
        return view('combo-course', ['courses' => $comboCourses]);
    }

    public function courseDetail()
    {
        return view('course-detail');
    }
}
