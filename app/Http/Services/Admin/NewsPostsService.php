<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Storage;
use Exception;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\NewsPost;
use App\Exceptions\WebException;

class NewsPostsService extends BaseService
{
    const URL = 'https://drive.google.com/uc?export=view&id=';
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
    public function store($request)
    {
        $inputs = $request->all();
        $image = null;

        if ($request->hasFile('image')) {
            $imageDisk = Storage::disk('google.image');
            $image = $request->file('image');
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . Carbon::now()->timestamp
                . '.' . pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);

            $imageDisk->put($fileName, file_get_contents($image));
            $imageInfo = collect($imageDisk->listContents('/', false))->where('type', 'file')->where('name', $fileName)->first();

            $image = Image::create([
                'url' => self::URL . $imageInfo['path'],
                'name' => $image->getClientOriginalName(),
                'description' => 'description',
            ]);
        }

        try {
            NewsPost::create(array_merge($inputs, [
                'description' => 'description',
                'image_id' => $image ? $image->id : null,
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
