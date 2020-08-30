<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\InformationResource;
use App\Http\Services\Admin\InformationService;
use App\Http\Requests\Admin\Information\StoreRequest;

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
     * 
     */
    public function index()
    {
        $informations = $this->service->getAllInformations();

        return view('admin/informations', ['informations' => $informations]);
    }

    public function store(StoreRequest $request)
    {
        $this->service->store($request->all());
        return redirect('admin/informations');
    }

    public function update(StoreRequest $request, $id)
    {
        $this->service->update($id, $request->all());    
    }

    public function show($id)
    {
        $info = $this->service->show($id);
        $data = new InformationResource($info);

        return view('admin/information', ['infoDetail' => $data]);
    }
}
