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
                                <input type="hidden" id="total_question_exercise_{{$exercise['id']}}" value="{{$exercise['total_question']}}"/>
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
                                    @foreach ($exercise['questions'] as $questionKey => $question)
                                        <div class="test">
                                            <div class="test__header">
                                                <div class="test__number">Câu {{$questionKey + 1}}. {{$question['question']}}</div>
                                                <audio class="audio" controls="">
                                                    <source
                                                        src="{{$question['audio']['url']}}"
                                                        type="audio/mpeg"
                                                    />
                                                </audio>
                                            </div>
                                            <div class="choice mb-3">
                                                @foreach ($question['answers'] as $answerKey => $answer)
                                                    <input type="hidden" name="{{$exercise['id']}}_answerIds[]" value="{{$answer['id']}}"/>
                                                    @if ($answer['is_right_answer'] === 1)
                                                    <input type="hidden" name="{{$exercise['id']}}_rightIds[]" value="{{$question['id']}},{{$answer['id']}}"/>
                                                    <input type="hidden" name="{{$exercise['id']}}_questionIds[]" value="{{$question['id']}}"/>
                                                    @endif
                                                    <div class="form-check" id="answer_{{$answer['id']}}">
                                                        <input
                                                            class="form-check-input dapan"
                                                            type="radio"
                                                            name="radio_{{$question['id']}}"
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
                                        <button class="button-submit mr-3" data-toggle="modal" data-target="#result-modal" onclick="showResultTest(<?php echo $exercise['id']; ?>)">
                                            Xem kết quả
                                        </button>
                                        <button class="button-submit mr-3">Làm lại</button>
                                        <button class="button-submit" onclick="showResult(<?php echo $exercise['id']; ?>)">Xem đáp án</button>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- End Courses Details Content -->
                            <!-- result information dialog -->
                            <div class="modal" tabindex="-1" role="dialog" id="result-modal">
                            <div class="modal-dialog" stype="width:600px;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">KẾT QUẢ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn làm đúng: <lable id="result-test"></lable> câu</p>
                                    </div>
                                </div>
                            </div>
                            </div>
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
        function showResult(exerciseId) {
            var nameAnswerIdsInput = exerciseId + "_answerIds[]";
            $('input[name="' + nameAnswerIdsInput + '"]').each(function() {
                var answerId = $(this).val();
                $("#answer_" + answerId).removeClass("wrong");
                $("#answer_" + answerId).removeClass("pass");
                $("#fa_" + answerId).removeClass("fa-times");
                $("#fa_" + answerId).removeClass("fa-check");
            });

            var rightIds = [];
            var nameRighIdsInput = exerciseId + "_rightIds[]";
            $('input[name="' + nameRighIdsInput + '"]').each(function() {
                var id = $(this).val().split(',');
                rightIds.push([id[0],id[1]]);
            });

            var nameQuestionIdsInput = exerciseId + "_questionIds[]";
            $('input[name="' + nameQuestionIdsInput + '"]').each(function() {
                var id = $(this).val();
                var idName = "radio_" + id;
                if($('input:radio[name="' + idName + '"]').is(":checked")) {
                    var answerId = $('input[name="' + idName + '"]:checked').val();

                    if (!checkExist(id, answerId, rightIds)) {
                        $("#answer_" + answerId).addClass("wrong");
                        $("#fa_" + answerId).addClass("fa-times");

                        rightId = getAnswerIdByQuestionId(id, rightIds);
                        $("#answer_" + rightId).addClass("pass");
                        $("#fa_" + rightId).addClass("fa-check");
                    } else {
                        $("#answer_" + answerId).addClass("pass");
                        $("#fa_" + answerId).addClass("fa-check");
                    }
                }
            });
      }

      function checkExist(question, answer, array) {
        var result = false;
        $.each(array, function(index, value) {
            var questionId = value[0];
            var rightId = value[1];

            if (question == questionId && rightId == answer) {
                result = true;
            }
        });

        return result;
      }

      function getAnswerIdByQuestionId(question, array)
      {
        var rightId;;
        $.each(array, function(index, value) {
            var questionId = value[0];

            if (question == questionId) {
                rightId = value[1];
            }
        });

        return rightId;
      }

      function showResultTest(exerciseId)
      {
        var totalQuestion = $('#total_question_exercise_' + exerciseId).val();
        var rightTotal = 0;
        var nameRighIdsInput = exerciseId + "_rightIds[]";
        $('input[name="' + nameRighIdsInput +'"]').each(function() {
            var id = $(this).val().split(',');
            var questionId = id[0];
            var rightId = id[1];

            var idName = "radio_" + questionId;
            if($('input:radio[name="' + idName + '"]').is(":checked")) {
                var answerId = $('input[name="' + idName + '"]:checked').val();

                if (rightId == answerId) {
                    rightTotal += 1;
                }
            }
        });

        $("#result-test").text(rightTotal + '/' + totalQuestion);
      }
    </script>
@endsection

