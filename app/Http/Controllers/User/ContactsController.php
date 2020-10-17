<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Services\Admin\ContactService;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Services\Admin\StudentContactService;

class ContactsController extends BaseController
{
    var $contactService;
    var $studentContactService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactService $contactService, StudentContactService $studentContactService)
    {
        parent::__construct();
        $this->contactService = $contactService;
        $this->studentContactService = $studentContactService;
    }

    public function contact()
    {
        $contactInfo = $this->contactService->getContactDisplayed();
        return view('contact', [
            'contact' => $contactInfo,
        ]);
    }

    /**
     * store
     */
    public function storeContact(StoreRequest $request)
    {
        $this->studentContactService->store($request->all());

        return redirect(route('contact', [
            'message' => 'Trung tâm đã nhận được thông tin phả hồi từ bạn, xin cảm ơn!'
        ]));
    }
}
