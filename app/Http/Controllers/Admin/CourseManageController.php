<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\CourseManageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        return view('admin/admin-home');
    }

    public function getAllCourses()
    {
        $courses = $this->service->getAllCousre()->toArray();
        return view('admin/course', ['courses' => $courses]);
    }
}
