<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\StoreRequest;
use App\Http\Resources\UnitResource;
use App\Http\Services\Admin\UnitManageService;

class UnitManageController extends Controller
{

    private $unitService;

    /**
     * Create a new controller instance.
     * @param UnitManageService $unitService
     */
    public function __construct(UnitManageService $unitService)
    {
        $this->unitService = $unitService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $units = $this->unitService->getAllUnits();
        $unitData = UnitResource::collection($units);

        return view('admin/course-management/unit-management', [
            'units' => $unitData->toArray(null),
        ]);
    }

    public function show($unitId)
    {
        $unit = $this->unitService->getUnitById($unitId);
        return view('admin/course-management/unit-management', ['unit' => $unit]);
    }

    public function store(StoreRequest $request)
    {
        $this->unitService->addNewUnit($request->all());
        return  redirect('/admin/unit-management');
    }

    public function update(StoreRequest $request, $id)
    {
        $this->unitService->updateUnit($request->all(), $id);
        return  redirect('/admin/unit-management');
    }

    public function destroy($id)
    {
        $this->unitService->deleteUnit($id);
        return  redirect('/admin/unit-management');
    }
}
