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
    public function __construct()
    {
        $this->infoService = new InformationService();
        $this->service = new InformationDetailService();
    }

    public function store(StoreDetailRequest $request)
    {
        $infoDetail = $this->service->createInfoDetail($request->all());

        return redirect('admin/information-details');
    }

    public function index()
    {
        $infoDetails = $this->service->getListInformationDetails();
        $infos = $this->infoService->getAllInformations();
        $data = InformationDetailResource::collection($infoDetails)->toArray(null);

        return view('admin/information-details', [
            'informationDetails' => $data,
            'informations' => $infos,
        ]);
    }
}
