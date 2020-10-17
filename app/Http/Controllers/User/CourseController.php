<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;

class CourseController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        parent::__construct();
    }

    public function course()
    {
        return view('course');
    }

    public function singleCourse()
    {
        return view('single-course');
    }

    public function comboCourse()
    {
        return view('combo-course');
    }
}
