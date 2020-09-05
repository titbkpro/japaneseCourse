<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Services\Admin\ContactService;
use App\Http\Requests\Admin\Contact\StoreRequest;

class ContactsController extends Controller
{
    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new ContactService();
    }

    /**
     * Index
     */
    public function index()
    {
        $contacts = $this->service->getAllContacts();

        return view('admin/contact/contacts', ['contacts' => ContactResource::collection($contacts)]);
    }

    /**
     * store
     */
    public function store(StoreRequest $request)
    {
        $this->service->store($request->all());

        return redirect(route('contacts.index'));
    }

    /**
     * update
     */
    public function update(StoreRequest $request, $id)
    {
        $this->service->update($id, $request->all());

        return redirect(route('contacts.index'));
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect(route('contacts.index'));
    }
}
