<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\PaymentInfoService;
use App\Http\Requests\Admin\Payment\StoreRequest;
use App\Http\Resources\PaymentInfoResource;

/**
 * Class PaymentInfosController
 */
class PaymentInfosController extends Controller
{
    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new PaymentInfoService();
    }

    /**
     * Index
     */
    public function index()
    {
        $payments = $this->service->getAllPaymentInfos();

        return view('admin/payment/payment_infos', [
            'payments' => PaymentInfoResource::collection($payments)->toArray(null)
            ]);
    }

    /**
     * store
     */
    public function store(StoreRequest $request)
    {
        $this->service->store($request->all());

        return redirect(route('payment_infos.index'));
    }

    /**
     * update
     */
    public function update(StoreRequest $request, $id)
    {
        $this->service->update($id, $request->all());

        return redirect(route('payment_infos.index'));
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect(route('payment_infos.index'));
    }
}
