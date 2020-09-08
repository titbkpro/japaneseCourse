<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Exception;
use App\Models\Info;
use App\Exceptions\WebException;
use App\Models\NewsCategory;

class NewsCategoryService extends BaseService
{
    /**
     * Get all information
     *
     * @return NewsCategory
     */
    public function getAllCategories()
    {
        return NewsCategory::all()->sortByDesc('updated_at');
    }

    /**
     * Store info
     *
     * @return NewsCategory
     */
    public function store($inputs)
    {
        try {
            NewsCategory::create([
                'description' => 'description',
                'name' => $inputs['name'],
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('store_error');
        }
    }

    /**
     * Update info
     *
     * @return Info
     */
    public function update($id, $inputs) {
        $newsCategory = NewsCategory::findOrFail($id);

        if ($newsCategory) {
            $newsCategory->update($inputs);
        } else {
            throw new WebException('update_error');
        }
    }

    /**
     * Update info
     *
     * @return Info
     */
    public function delete($id) {
        $newsCategory = NewsCategory::findOrFail($id);

        try {
            $newsCategory->delete();
            $newsCategory->newsPosts()->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }
}
