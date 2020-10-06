<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeedbacksResourcce;
use App\Http\Services\Admin\FeedbackService;
use App\Http\Requests\Admin\Feedback\StoreRequest;

/**
 * Class FeedbacksController
 */
class FeedbacksController extends Controller
{
    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new FeedbackService();
    }

    /**
     * Index
     */
    public function index()
    {
        $feedbacks = $this->service->getAllFeedback();

        return view('admin/feedbacks/feedbacks', ['feedbacks' => FeedbacksResourcce::collection($feedbacks)]);
    }

    /**
     * store
     */
    public function store(StoreRequest $request)
    {
        $this->service->store($request);

        return redirect(route('feedbacks.index'));
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect(route('feedbacks.index'));
    }
}
