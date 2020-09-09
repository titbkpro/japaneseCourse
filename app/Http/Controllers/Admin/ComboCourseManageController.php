<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Services\Admin\ComboCourseManageService;

class ComboCourseManageController extends Controller
{
    public $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new ComboCourseManageService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $combos = $this->service->getAllComboCourses();
        return view('admin/course-management/combo-course-management', ['combos' => $combos]);
    }

    public function show($comboId)
    {
        $combo = $this->service->getComboCourseById($comboId);
        return view('admin/course-management/combo-course-management', ['combo' => $combo]);
    }

    public function store(StoreRequest $request)
    {
        $this->service->addNewComboCourse($request->all());
        return  redirect('/admin/combo-course-management');
    }

    public function update(StoreRequest $request, $id)
    {
        $this->service->updateComboCourse($request->all(), $id);
        return  redirect('/admin/combo-course-management');
    }

    public function destroy($comboId)
    {
        $this->service->deleteComboCourse($comboId);
        return  redirect('/admin/combo-course-management');
    }
}
