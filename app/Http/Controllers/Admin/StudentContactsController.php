<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\StudentContactService;
use App\Http\Requests\Admin\Contact\StudentContactStoreRequest;

class StudentContactsController extends Controller
{
    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new StudentContactService();
    }

    /**
     * Index
     */
    public function index()
    {
        $studentContacts = $this->service->getAllStudentContacts();

        return view('admin/contact/student-contacts', ['studentContacts' => $studentContacts]);
    }

    /**
     * store
     */
    public function store(StudentContactStoreRequest $request)
    {
        $this->service->store($request->all());

        return redirect(route('student_contacts.index'));
    }

    /**
     * update
     */
    public function update(StudentContactStoreRequest $request, $id)
    {
        $this->service->update($id, $request->all());

        return redirect(route('student_contacts.index'));
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect(route('student_contacts.index'));
    }
}
