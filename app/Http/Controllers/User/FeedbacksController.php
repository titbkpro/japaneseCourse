<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Resources\FeedbacksResourcce;
use App\Http\Services\Admin\FeedbackService;

class FeedbacksController extends BaseController
{
    var $feedbackService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FeedbackService $feedbackService)
    {
        parent::__construct();
        $this->feedbackService = $feedbackService;
    }

    public function feedback()
    {
        $feedbacks = $this->feedbackService->getAllFeedback();

        return view('feedback', ['feedbacks' => FeedbacksResourcce::collection($feedbacks)]);
    }
}
