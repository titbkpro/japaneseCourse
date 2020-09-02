<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\InformationService;
use App\Http\Resources\InformationDetailResource;
use App\Http\Services\Admin\InformationDetailService;
use App\Http\Requests\Admin\Information\StoreDetailRequest;

class InformationDetailsController extends Controller
{
    public $service;

    public $infoService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InformationService $infoService, InformationDetailService $service)
    {
        $this->infoService = $infoService;
        $this->service = $service;
    }

    /**
     * Store info detail
     */
    public function store(StoreDetailRequest $request)
    {
        $this->service->createInfoDetail($request->all());

        return redirect('admin/information-details');
    }

    /**
     * Update info detail
     */
    public function update(StoreDetailRequest $request, $id)
    {
        $this->service->updateInfoDetail($id, $request->all());

        return redirect('admin/information-details');
    }

    /**
     * Get all info detail
     */
    public function index()
    {
        $infoDetails = $this->service->getListInformationDetails();
        $infos = $this->infoService->getAllInformations();
        $data = InformationDetailResource::collection($infoDetails)->toArray(null);

        return view('admin/information/information-details', [
            'informationDetails' => $data,
            'informations' => $infos,
        ]);
    }

    /**
     * Delete info detail
     */
    public function destroy($id)
    {
        $this->service->deleteInfoDetail($id);

        return redirect('admin/information-details');
    }

    /**
     * Delete info detail
     */
    public function show($id)
    {
        $infoDetail = $this->service->showInfoDetail($id);

        return redirect('admin/information-details', ['informationDetail' => new InformationDetailResource($infoDetail)]);
    }
}
