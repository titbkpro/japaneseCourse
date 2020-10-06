<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
