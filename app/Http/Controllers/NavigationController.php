<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreRequest;
use App\Http\Resources\FeedbacksResourcce;
use App\Http\Resources\InformationDetailResource;
use App\Http\Resources\NewsPostResource;
use App\Http\Services\Admin\ContactService;
use App\Http\Services\Admin\FeedbackService;
use App\Http\Services\Admin\InformationDetailService;
use App\Http\Services\Admin\InformationService;
use App\Http\Services\Admin\NewsCategoryService;
use App\Http\Services\Admin\NewsPostsService;
use App\Http\Services\Admin\StudentContactService;

class NavigationController extends Controller
{
    var $feedbackService;
    var $newsPostservice;
    var $categoryService;
    var $contactService;
    var $studenContactService;
    var $informationDetailService;
    var $informationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        FeedbackService $feedbackService,
        NewsPostsService $newsPostservice,
        NewsCategoryService $categoryService,
        ContactService $contactService,
        StudentContactService $studenContactService,
        InformationDetailService $informationDetailService,
        InformationService $informationService)
    {
        /*$this->middleware('auth');*/
        $this->feedbackService = $feedbackService;
        $this->newsPostservice = $newsPostservice;
        $this->categoryService = $categoryService;
        $this->studenContactService = $studenContactService;
        $this->contactService = $contactService;
        $this->informationDetailService = $informationDetailService;
        $this->informationService = $informationService;
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

    public function feedback()
    {
        $feedbacks = $this->feedbackService->getAllFeedback();

        return view('feedback', ['feedbacks' => FeedbacksResourcce::collection($feedbacks)]);
    }

    public function news()
    {
        $newsPosts = $this->newsPostservice->getListNewsPosts();
        $categories = $this->categoryService->getAllCategories();
        $data = NewsPostResource::collection($newsPosts)->toArray(null);

        return view('news', [
            'newsPosts' => $data,
            'categories' => $categories,
        ]);
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

    public function newsList()
    {
        return view('news-list');
    }
}
