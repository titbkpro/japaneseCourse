@extends('layouts.main-page')

@section('content')
    <!-- Start Courses Details Area -->
    <section class="htc__courses__details__page bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="courses__details__top">
                        <div>
                            <h2 class="title-section">{{$course['name']}}</h2>
                            <h5 class="title-name-section">
                                Nghe hiểu Bài 26
                                <span class="view-section">123456 lượt xem</span>
                            </h5>
                        </div>
                        <div class="courses__teacher">
                            <div class="crs__teacher__images">
                                <img
                                    src="images/course/sm-img/1.png"
                                    alt="courses teacher images"
                                />
                            </div>
                            <h6>Giáo viên</h6>
                            <span>/</span>
                            <h4><a href="profile.html">Ms. Lam </a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt--50">
                <div
                    class="col-md-3 col-lg-3 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40"
                >
                    <div class="htc__courses__rightsidebar">
                        <!-- Start All Courses -->
                        <div class="htc__blog__courses">
                            <h2 class="title__style--2">Tiến trình học</h2>
                            <div class="sidebar-menu">
                                <ul>
                                    @foreach($course['units'] as $unit)
                                    <li>
                                        <h3 class="item-sub">{{$unit['name']}}</h3>
                                        <ul class="item_lv_2">
                                            @foreach($unit['children'] as $unitLevel2)
                                            <li>
                                                <h4 class="item-sub">{{$unitLevel2['name']}}</h4>
                                                <ul class="item_lv_3">
                                                    @foreach($unitLevel2['children'] as $unitLevel3)
                                                    <li>
                                                        <h4 class="item-sub">{{$unitLevel3['name']}}</h4>
                                                        <ul class="item_lv_4">
                                                            @foreach($unitLevel3['children'] as $unitLevel4)
                                                            <li>
                                                                <h4 class="item-sub">{{$unitLevel4['name']}}</h4>
                                                                <ul class="item_lv_5">
                                                                    @foreach($unitLevel4['children'] as $unitLevel5)
                                                                    <li>
                                                                        <h4 class="item-sub">{{$unitLevel5['name']}}</h4>
                                                                    </li>
                                                                    @endforeach

                                                                    @if(empty($unitLevel4['children']))
                                                                        @foreach($unitLevel4['lesson'] as $lesson)
                                                                        <li>
                                                                            <a href="/course-detail/{{$course['id']}}/lesson/{{$lesson['id']}}">{{$lesson['name']}}</a>
                                                                        </li>
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                            @endforeach
                                                            @if(empty($unitLevel3['children']))
                                                                @foreach($unitLevel3['lesson'] as $lesson)
                                                                <li>
                                                                    <a href="/course-detail/{{$course['id']}}/lesson/{{$lesson['id']}}">{{$lesson['name']}}</a>
                                                                </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </li>
                                                    @endforeach

                                                    @if(empty($unitLevel2['children']))
                                                        @foreach($unitLevel2['lesson'] as $lesson)
                                                        <li>
                                                            <a href="/course-detail/{{$course['id']}}/lesson/{{$lesson['id']}}">{{$lesson['name']}}</a>
                                                        </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            @endforeach

                                            @if(empty($unit['children']))
                                                @foreach($unit['lesson'] as $lesson)
                                                <li>
                                                    <a href="/course-detail/{{$course['id']}}/lesson/{{$lesson['id']}}">{{$lesson['name']}}</a>
                                                </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End All Courses -->
                        <!-- Start Courses Features -->
                        <div class="cres__features">
                            <h2 class="title__style--2">COURSE FEATURES</h2>
                            <div class="crs__features__list">
                                <ul class="feature__duration">
                                    <li>
                                        <i class="icon ion-android-calendar"></i> Khai giảng:
                                    </li>
                                    <li><i class="icon ion-android-people"></i> Số lượng:</li>
                                    <li><i class="icon ion-android-time"></i> Thời gian:</li>
                                    <li>
                                        <i class="icon ion-android-stopwatch"></i> Thời hạn:
                                    </li>
                                </ul>
                                <ul class="feature__time">
                                    <li>12/12/2020</li>
                                    <li>30 học viên</li>
                                    <li>19:00h - 21:00h</li>
                                    <li>55 giờ</li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Courses Features -->
                    </div>
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                    <div class="htc__courses__leftsidebar">
                    @if(!empty($lessonDetail))
                        <div class="htc__crs__tab__wrap">
                            <!-- Start Courses Details TAb -->
                            <ul class="courses__view mt--50" role="tablist">
                                @foreach ($lessonDetail['exercises'] as $exerciseKey => $exercise)
                                <li role="presentation" class="{{ $exerciseKey == 0 ? 'description active' : 'reviews' }}">
                                    <a href="#test_{{$exerciseKey}}" role="tab" data-toggle="tab"
                                    ><i class="icon ion-ios-list-outline"></i>{{$exercise['name']}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- End Courses Details TAb -->
                            <div class="courses__tab__content">
                                @foreach ($lessonDetail['exercises'] as $exerciseKey => $exercise)
                                <div
                                    id="test_{{$exerciseKey}}"
                                    role="tabpanel"
                                    class="single__crs__content tab-pane fade {{ $exerciseKey == 0 ? 'in active' : '' }} clearfix "
                                >
                                    <div class="single__crs__details">
                                        <div class="test-image">
                                            <h3 class="question-title">{!!$exercise['content']!!}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="single__crs__details">
                                    @php
                                    $rightIds = []
                                    @endphp
                                    @foreach ($exercise['questions'] as $questionKey => $question)
                                        <div class="test">
                                            <div class="test__header">
                                                <div class="test__number">Câu {{$questionKey + 1}}. {{$question['question']}}</div>
                                                <audio class="audio" controls="">
                                                    <source
                                                        src="https://tiengnhatcolam.vn/storage/questions/May2019/1uabOoKBVNJCwJ1glkBO.mp3"
                                                        type="audio/mpeg"
                                                    />
                                                </audio>
                                            </div>
                                            <div class="choice mb-3">
                                                @foreach ($question['answers'] as $answerKey => $answer)
                                                    @if ($answer['is_right_answer'] === 1)
                                                        @php
                                                            $rightIds = [
                                                                'question_id' => $question['id'],
                                                                'right_answer_id' => $answer['id'],
                                                            ]
                                                        @endphp
                                                    @endif
                                                    <div class="form-check" id="answer_{{$answer['id']}}">
                                                        <input
                                                            class="form-check-input dapan"
                                                            type="radio"
                                                            name="group-check-1"
                                                            id="checkbox_{{$answer['id']}}"
                                                            value="{{$answer['id']}}"
                                                        />
                                                        <label class="form-check-label" for="checkbox_1">
                                                        @if ($answerKey === 0) A. @elseif ($answerKey === 1) B. @elseif ($answerKey === 2) C. @else D. @endif {{$answer['answer']}}</label
                                                        >
                                                        <span class="fa" id="fa_{{$answer['id']}}"></span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="test-submit">
                                        <button class="button-submit mr-3">
                                            Xem kết quả
                                        </button>
                                        <button class="button-submit mr-3">Làm lại</button>
                                        <button class="button-submit">Xem đáp án</button>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- End Courses Details Content -->
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Courses Details Area -->
    <div class="js-footer"></div>
    <script>

        function showResult($rightIds) {
            $.each( rightIds, function( key, rightId) {
                $("#answer_" + key).addClass("pass");
            });
      }
    </script>
@endsection

