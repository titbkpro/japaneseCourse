<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Resources\NewsPostResource;
use App\Http\Services\Admin\NewsPostsService;
use App\Http\Services\Admin\NewsCategoryService;

class NewsPostsController extends BaseController
{
    var $newsPostservice;
    var $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsPostsService $newsPostservice, NewsCategoryService $categoryService)
    {
        parent::__construct();
        $this->newsPostservice = $newsPostservice;
        $this->categoryService = $categoryService;
    }

    public function news()
    {
        $newsPosts = $this->newsPostservice->getListNewsPosts();
        $categories = $this->categoryService->getAllCategories();
        $data = NewsPostResource::collection($newsPosts);

        return view('news', [
            'newsPosts' => $data,
            'categories' => $categories,
        ]);
    }

    public function index($id)
    {
        $newsPosts = $this->newsPostservice->getNewsPostByCategories($id);

        return view('news-list', [
            'newsPosts' => NewsPostResource::collection($newsPosts),
        ]);
    }

    public function show($id)
    {
        $newsPost = $this->newsPostservice->getNewsPostById($id);

        return view('news', [
            'newsPost' => new NewsPostResource($newsPost),
        ]);
    }
}
