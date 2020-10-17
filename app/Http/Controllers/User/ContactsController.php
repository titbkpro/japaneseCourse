<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\ContactService;
use App\Http\Requests\Contact\StoreRequest;

class ContactsController extends BaseController
{
    var $contactService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactService $contactService)
    {
        parent::__construct();
        $this->contactService = $contactService;
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
        $this->studenContactService->store($request->all());

        return redirect(route('contact', [
            'message' => 'Trung tâm đã nhận được thông tin phả hồi từ bạn, xin cảm ơn!'
        ]));
    }
}
