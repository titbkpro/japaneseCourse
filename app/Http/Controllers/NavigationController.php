<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function support()
    {
        return view('support');
    }

    public function contact()
    {
        return view('contact');
    }

    public function opinion()
    {
        return view('opinion');
    }

    public function news()
    {
        return view('news');
    }
}
