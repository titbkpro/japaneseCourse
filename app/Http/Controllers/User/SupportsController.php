<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Resources\InformationDetailResource;
use App\Http\Services\Admin\InformationService;
use App\Http\Services\Admin\InformationDetailService;

class SupportsController extends BaseController
{
    var $informationDetailService;
    var $informationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InformationDetailService $informationDetailService, InformationService $informationService)
    {
        parent::__construct();
        $this->informationDetailService = $informationDetailService;
        $this->informationService = $informationService;
    }

    public function support()
    {
        $infoDetails = $this->informationDetailService->getListInformationDetailsByInfoId(1);
        $info = $this->informationService->getInfoDetailById(1);
        $data = InformationDetailResource::collection($infoDetails);

        return view('support', [
            'info' => $info,
            'informationDetails' => $data,
        ]);
    }
}
