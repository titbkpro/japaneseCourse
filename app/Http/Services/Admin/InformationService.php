<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Exception;
use App\Models\Info;
use App\Exceptions\WebException;

class InformationService extends BaseService
{
    /**
     * Get all information
     *
     * @return Info
     */
    public function getAllInformations()
    {
        return Info::all();
    }

    /**
     * Store info
     *
     * @return Info
     */
    public function store($inputs)
    {
        try {
            $info = Info::create([
                'description' => 'description',
                'name' => $inputs['name'],
            ]);

            return $info;
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
        $info = Info::findOrFail($id);

        if ($info) {
            $info->update($inputs);
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
        $info = Info::findOrFail($id);

        DB::beginTransaction();
        try {
            $info->delete();
            $info->infoDetails()->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }

    /**
     * Get information detail
     *
     * @return Info
     */
    public function getInfoDetailById($id)
    {
        return Info::findOrFail($id);
    }
}
