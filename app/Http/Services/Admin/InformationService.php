<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Exception;
use App\Models\Info;
use App\Models\InfoDetail;
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

    public function show($id)
    {
        return Info::findOrFail($id);
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
            if ($info) {
                $info->delete();
                $info->infoDetails()->delete();
            } else {
                throw new WebException('delete_error');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }

    /**
     * Create info detail
     *
     * @return Info
     */
    public function createInfoDetail($inputs)
    {
        try {
            InfoDetail::create($inputs);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new WebException('store_error');
        }
    }

    /**
     * Update info detail
     *
     * @return Info
     */
    public function updateInfoDetail($id, $inputs)
    {
        $infoDetail = InfoDetail::findOrFail($id);

        if ($infoDetail) {
            $infoDetail->update($inputs);
        } else {
            throw new WebException('update_error');
        }
    }

    /**
     * Delete info detail
     *
     * @return Info
     */
    public function deleteInfoDetail($id, $inputs)
    {
        $infoDetail = InfoDetail::findOrFail($id);

        if ($infoDetail) {
            $infoDetail->delete();
        } else {
            throw new WebException('delete_error');
        }
    }
}
