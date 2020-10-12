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
        /*$this->middleware('auth');*/
    }

    public function support()
    {
        return view('support');
    }

    public function contact()
    {
        return view('contact');
    }

    public function feedback()
    {
        return view('feedback');
    }

    public function news()
    {
        return view('news');
    }

    public function newsList()
    {
        return view('news-list');
    }
}
