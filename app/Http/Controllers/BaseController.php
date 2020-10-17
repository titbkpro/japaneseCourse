<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Services\Admin\NewsCategoryService;

class BaseController extends Controller
{
    public function __construct() {
        $newsCategories = $this->getNewsCategories();

        view()->share('new_categories', $newsCategories);
        view()->share('abc', 'hihiihi');
    }

    public function getNewsCategories()
    {
        $this->categoryService = new NewsCategoryService();
        $data = $this->categoryService->getAllCategories();
        $newsCategories = [];

        foreach ($data as $item) {
            $newsCategories[] = [
                'id' => $item->id,
                'name' => $item->name,
            ];
        }

        return $newsCategories;
    }
}
