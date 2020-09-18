<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsPostResource;
use App\Http\Services\Admin\NewsPostsService;
use App\Http\Services\Admin\NewsCategoryService;
use App\Http\Requests\Admin\News\NewsPostStoreRequest;

class NewsPostsController extends Controller
{
    public $service;

    public $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsPostsService $newsPostsService, NewsCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->service = $newsPostsService;
    }

    /**
     * Store info detail
     */
    public function store(NewsPostStoreRequest $request)
    {
        $this->service->store($request);

        return redirect(route('news_posts.index'));
    }

    /**
     * Update info detail
     */
    public function update(NewsPostStoreRequest $request, $id)
    {
        $this->service->update($id, $request);

        return redirect(route('news_posts.index'));
    }

    /**
     * Get all info detail
     */
    public function index()
    {
        $newsPosts = $this->service->getListNewsPosts();
        $categories = $this->categoryService->getAllCategories();
        $data = NewsPostResource::collection($newsPosts)->toArray(null);

        return view('admin/news/posts', [
            'newsPosts' => $data,
            'categories' => $categories,
        ]);
    }

    /**
     * Delete info detail
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect(route('news_posts.index'));
    }
}
