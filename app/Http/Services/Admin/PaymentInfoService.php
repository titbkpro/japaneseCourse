<?php

namespace App\Http\Services\Admin;

use Log;
use Exception;
use App\Models\Info;
use App\Models\PaymentInfo;
use App\Models\NewsCategory;
use App\Exceptions\WebException;

class PaymentInfoService extends BaseService
{
    /**
     * Get all information
     *
     * @return NewsCategory
     */
    public function getAllPaymentInfos()
    {
        return PaymentInfo::all()->sortByDesc('updated_at');
    }

    /**
     * Store info
     *
     * @return NewsCategory
     */
    public function store($inputs)
    {
        try {
            PaymentInfo::create([
                'name' => $inputs['name'],
                'content' => $inputs['content'],
                'status' => $inputs['status'],
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
        $paymentInfo = PaymentInfo::findOrFail($id);

        if ($paymentInfo) {
            $paymentInfo->update($inputs);
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
        $paymentInfo = PaymentInfo::findOrFail($id);

        try {
            $paymentInfo->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }
}
