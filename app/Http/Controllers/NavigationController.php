<?php

namespace App\Http\Controllers;

use App\Http\Services\Admin\NewsCategoryService;

class NavigationController extends Controller
{
    var $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function newsList()
    {
        return view('news-list');
    }
}
