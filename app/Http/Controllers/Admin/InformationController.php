<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\InformationService;
use App\Http\Requests\Admin\Information\StoreRequest;

/**
 * Class InformationController
 */
class InformationController extends Controller
{
    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new InformationService();
    }

    /**
     * Index
     */
    public function index()
    {
        $informations = $this->service->getAllInformations();

        return view('admin/information/informations', ['informations' => $informations]);
    }

    /**
     * store
     */
    public function store(StoreRequest $request)
    {
        $this->service->store($request->all());

        return redirect('admin/informations');
    }

    /**
     * update
     */
    public function update(StoreRequest $request, $id)
    {
        $this->service->update($id, $request->all());

        return redirect('admin/informations');
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect('admin/informations');
    }
}
