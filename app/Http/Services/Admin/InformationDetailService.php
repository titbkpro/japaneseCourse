<?php

namespace App\Http\Services\Admin;

use DB;
use Log;
use Exception;
use App\Models\Info;
use App\Models\InfoDetail;
use App\Exceptions\WebException;

class InformationDetailService extends BaseService
{
    /**
     * Get all info detail
     *
     * @return InfoDetail
     */
    public function getListInformationDetails()
    {
        return InfoDetail::all();
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
