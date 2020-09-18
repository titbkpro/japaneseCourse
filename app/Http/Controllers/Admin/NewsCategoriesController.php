<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\NewsCategoryService;
use App\Http\Requests\Admin\News\NewsCategoryStoreRequest;

/**
 * Class NewsCategoriesController
 */
class NewsCategoriesController extends Controller
{
    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new NewsCategoryService();
    }

    /**
     * Index
     */
    public function index()
    {
        $categories = $this->service->getAllCategories();

        return view('admin/news/categories', ['categories' => $categories]);
    }

    /**
     * store
     */
    public function store(NewsCategoryStoreRequest $request)
    {
        $this->service->store($request->all());

        return redirect(route('news_categories.index'));
    }

    /**
     * update
     */
    public function update(NewsCategoryStoreRequest $request, $id)
    {
        $this->service->update($id, $request->all());

        return redirect(route('news_categories.index'));
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect(route('news_categories.index'));
    }
}
