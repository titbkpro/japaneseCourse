<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\ImportRequest;
use App\Http\Requests\Admin\Unit\StoreRequest;
use App\Http\Resources\UnitResource;
use App\Http\Services\Admin\ComboCourseManageService;
use App\Http\Services\Admin\SingleCourseManageService;
use App\Http\Services\Admin\UnitManageService;
use App\Models\UnitImport;
use Maatwebsite\Excel\Facades\Excel;

class UnitManageController extends Controller
{

    private $unitService;

    private $singleCourseService;

    private $comboCourseService;

    /**
     * Create a new controller instance.
     * @param UnitManageService $unitService
     * @param SingleCourseManageService $singleCourseService
     * @param ComboCourseManageService $comboCourseService
     */
    public function __construct(UnitManageService $unitService,
                                SingleCourseManageService $singleCourseService,
                                ComboCourseManageService $comboCourseService)
    {
        $this->unitService = $unitService;
        $this->singleCourseService = $singleCourseService;
        $this->comboCourseService = $comboCourseService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $singleCourses = $this->singleCourseService->getAllSingleCourses();
        $comboCourses = $this->comboCourseService->getAllComboCourses();

        $units = $this->unitService->getAllUnits();
        $unitData = UnitResource::collection($units);

        return view('admin/course-management/unit-management', [
            'units' => $unitData->toArray(null),
            'courses' => $singleCourses->toArray(),
            'combos' => $comboCourses->toArray(),
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

    public function import(ImportRequest $request)
    {
        $unitId = $request->unit_id;
        session(['unit_id' => $unitId]);
        Excel::import(new UnitImport(), $request->file('import_file'));
        return back();
    }
}
