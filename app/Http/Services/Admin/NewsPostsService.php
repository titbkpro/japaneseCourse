<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Exception;
use App\Models\NewsPost;
use App\Exceptions\WebException;

class NewsPostsService extends BaseService
{
    /**
     * Get all new post
     *
     * @return NewsPost
     */
    public function getListNewsPosts()
    {
        return NewsPost::all()->sortByDesc('updated_at');
    }
    /**
     * Create new post
     *
     * @return NewsPost
     */
    public function store($inputs)
    {
        try {
            NewsPost::create(array_merge($inputs, [
                'description' => 'description',
            ]));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new WebException('store_error');
        }
    }

    /**
     * Update new post
     *
     * @return NewsPost
     */
    public function update($id, $inputs)
    {
        $newsPost = NewsPost::findOrFail($id);

        if ($newsPost) {
            $newsPost->update($inputs);
        } else {
            throw new WebException('update_error');
        }
    }

    /**
     * Delete new post
     *
     * @return NewsPost
     */
    public function delete($id)
    {
        $newsPost = NewsPost::findOrFail($id);

        if ($newsPost) {
            $newsPost->delete();
        } else {
            throw new WebException('delete_error');
        }
    }
}
