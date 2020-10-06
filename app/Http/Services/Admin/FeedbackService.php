<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Storage;
use Exception;
use Carbon\Carbon;
use App\Models\Info;
use App\Models\DataFile;
use App\Models\NewsCategory;
use App\Models\FeedbackImage;
use App\Exceptions\WebException;

class FeedbackService extends BaseService
{
    /**
     * Get all information
     *
     * @return NewsCategory
     */
    public function getAllFeedback()
    {
        return FeedbackImage::all()->sortByDesc('created_at');
    }

    /**
     * Store info
     *
     * @return NewsCategory
     */
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $imageDisk = Storage::disk('google.image');
            $image = $request->file('image');
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . Carbon::now()->timestamp
                . '.' . pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);

            $imageDisk->put($fileName, file_get_contents($image));
            $imageInfo = collect($imageDisk->listContents('/', false))->where('type', 'file')->where('name', $fileName)->first();

            $image = DataFile::create([
                'url' => Storage::disk('google.image')->url($imageInfo['path']),
                'type' => DataFile::IMAGE,
                'name' => $image->getClientOriginalName(),
                'description' => 'description',
            ]);

            FeedbackImage::create(array_merge([
                'image_id' => $image->id,
            ]));

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new WebException('store_error');
        }
    }

    /**
     * Update info
     *
     * @return Info
     */
    public function delete($id) {
        $feedbackImage = FeedbackImage::findOrFail($id);
        DB::beginTransaction();

        try {
            $feedbackImage->delete();
            $feedbackImage->image()->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }
}
