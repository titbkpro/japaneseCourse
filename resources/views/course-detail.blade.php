@extends('layouts.main-page')

@section('content')
    <!-- Start Courses Details Area -->
    <section class="htc__courses__details__page bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="courses__details__top">
                        <div>
                            <h2 class="title-section">Khóa Học N4 - 10 tháng</h2>
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
                                    <li>
                                        <h3 class="item-sub">Hướng dẫn học N3</h3>
                                        <ul class="item_lv_2">
                                            <li>
                                                <h4 href="#" class="item-sub">Hướng dẫn học N3</h4>
                                                <ul class="item_lv_3">
                                                    <li><a href="#">Link</a></li>
                                                    <li>
                                                        <h4 href="#" class="item-sub">
                                                            Giới thiệu khóa N3
                                                        </h4>
                                                        <ul class="item_lv_4">
                                                            <li>
                                                                <a class="active" href="#"
                                                                >Giới thiệu lộ trình và giáo trình học
                                                                    N3</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#">Giáo trình N3 file PDF</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <h4 href="#" class="item-sub">
                                                            Lộ trình tham khảo
                                                        </h4>
                                                        <ul class="item_lv_4">
                                                            <li>
                                                                <a href="#">Lộ trình 210 ngày</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Lộ trình 160 ngày</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Lộ trình 120 ngày</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h3 class="item-sub">Học N3 Giai đoạn 1</h3>
                                        <ul class="item_lv_2">
                                            <li>
                                                <h4 href="#" class="item-sub">Kanji</h4>
                                                <ul class="item_lv_3">
                                                    <li><a href="#">Link</a></li>
                                                    <li>
                                                        <h4 href="#" class="item-sub">
                                                            Hướng dẫn học Kanji
                                                        </h4>
                                                        <ul class="item_lv_4">
                                                            <li>
                                                                <a href="#">Hướng dẫn học Kanji</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <h4 href="#" class="item-sub">
                                                            Kanji Chương 1
                                                        </h4>
                                                        <ul class="item_lv_4">
                                                            <li>
                                                                <a href="#">Chương 1 buổi 1</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Chương 1 buổi 2</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Chương 1 buổi 3</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
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
                        <div class="htc__crs__tab__wrap">
                            <!-- Start Courses Details TAb -->
                            <ul class="courses__view mt--50" role="tablist">
                                <li role="presentation" class="description active">
                                    <a href="#test_1" role="tab" data-toggle="tab"
                                    ><i class="icon ion-ios-list-outline"></i>Bài 1</a
                                    >
                                </li>
                                <li role="presentation" class="week">
                                    <a href="#test_2" role="tab" data-toggle="tab"
                                    ><i class="icon ion-ios-list-outline"></i>Bài 2</a
                                    >
                                </li>
                                <li role="presentation" class="reviews">
                                    <a href="#test_3" role="tab" data-toggle="tab"
                                    ><i class="icon ion-ios-list-outline"></i>Bài 3</a
                                    >
                                </li>
                                <li role="presentation" class="reviews">
                                    <a href="#test_4" role="tab" data-toggle="tab"
                                    ><i class="icon ion-ios-list-outline"></i>Bài 4</a
                                    >
                                </li>
                            </ul>
                            <!-- End Courses Details TAb -->
                            <div class="courses__tab__content">
                                <div
                                    id="test_1"
                                    role="tabpanel"
                                    class="single__crs__content tab-pane fade in active clearfix"
                                >
                                    <div class="single__crs__details">
                                        <div class="test-image">
                                            <h3 class="question-title">
                                                会社の　人は　どうですか。どうしてですか。 Người của
                                                công ty được đề cập trong bài hội thoại là người như
                                                thế nào và tại sao?
                                            </h3>
                                            <h4 class="question-name">
                                                ＜どうですか＞ Như thế nào?
                                            </h4>
                                            <img
                                                src="https://tiengnhatcolam.vn/storage/tests/August2019/Bai26_choukai_1_1.png"
                                                alt=""
                                            />
                                            <h4 class="question-name">どうして＞ Tại sao?</h4>
                                            <img
                                                src="https://tiengnhatcolam.vn/storage/tests/August2019/Bai26_choukai_1_2.png"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                    <div class="single__crs__details">
                                        <div class="test">
                                            <div class="test__header">
                                                <div class="test__number">Câu: 1</div>
                                                <audio class="audio" controls="">
                                                    <source
                                                        src="https://tiengnhatcolam.vn/storage/questions/May2019/1uabOoKBVNJCwJ1glkBO.mp3"
                                                        type="audio/mpeg"
                                                    />
                                                </audio>
                                            </div>
                                            <div class="choice mb-3">
                                                <div class="form-check pass">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="checkbox_1"
                                                        value="6375"
                                                    />
                                                    <label class="form-check-label" for="checkbox_1"
                                                    >A. d- 3</label
                                                    >
                                                    <span class="fa fa-check"></span>
                                                </div>
                                                <div class="form-check wrong">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6376"
                                                        value="6376"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6376"
                                                    >B. d- 4</label
                                                    >
                                                    <span class="fa fa-times"></span>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6377"
                                                        value="6377"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6377"
                                                    >C. e- 3</label
                                                    >
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6378"
                                                        value="6378"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6378"
                                                    >D. e- 4</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="test">
                                            <div class="test__header">
                                                <div class="test__number">Câu: 2</div>
                                                <audio class="audio" controls="">
                                                    <source
                                                        src="https://tiengnhatcolam.vn/storage/questions/May2019/1uabOoKBVNJCwJ1glkBO.mp3"
                                                        type="audio/mpeg"
                                                    />
                                                </audio>
                                            </div>
                                            <div class="choice mb-3">
                                                <div class="form-check pass">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="checkbox_1"
                                                        value="6375"
                                                    />
                                                    <label class="form-check-label" for="checkbox_1"
                                                    >A. d- 3</label
                                                    >
                                                    <span class="fa fa-check"></span>
                                                </div>
                                                <div class="form-check wrong">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6376"
                                                        value="6376"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6376"
                                                    >B. d- 4</label
                                                    >
                                                    <span class="fa fa-times"></span>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6377"
                                                        value="6377"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6377"
                                                    >C. e- 3</label
                                                    >
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6378"
                                                        value="6378"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6378"
                                                    >D. e- 4</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="test">
                                            <div class="test__header">
                                                <div class="test__number">Câu: 3</div>
                                                <audio class="audio" controls="">
                                                    <source
                                                        src="https://tiengnhatcolam.vn/storage/questions/May2019/1uabOoKBVNJCwJ1glkBO.mp3"
                                                        type="audio/mpeg"
                                                    />
                                                </audio>
                                            </div>
                                            <div class="choice mb-3">
                                                <div class="form-check pass">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="checkbox_1"
                                                        value="6375"
                                                    />
                                                    <label class="form-check-label" for="checkbox_1"
                                                    >A. d- 3</label
                                                    >
                                                    <span class="fa fa-check"></span>
                                                </div>
                                                <div class="form-check wrong">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6376"
                                                        value="6376"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6376"
                                                    >B. d- 4</label
                                                    >
                                                    <span class="fa fa-times"></span>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6377"
                                                        value="6377"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6377"
                                                    >C. e- 3</label
                                                    >
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input dapan"
                                                        type="radio"
                                                        name="group-check-1"
                                                        id="answers_1676_6378"
                                                        value="6378"
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="answers_1676_6378"
                                                    >D. e- 4</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="test-submit">
                                            <button class="button-submit mr-3">
                                                Xem kết quả
                                            </button>
                                            <button class="button-submit mr-3">Làm lại</button>
                                            <button class="button-submit">Xem đáp án</button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="test_2"
                                    role="tabpanel"
                                    class="single__crs__content tab-pane fade clearfix"
                                >
                                    <div class="single__crs__details">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the
                                            industry’s standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has
                                            survived not only five centuries, but also the leap
                                            into electronic typesetting, remaining essentially
                                            unchanged.
                                        </p>
                                    </div>
                                </div>
                                <div
                                    id="test_3"
                                    role="tabpanel"
                                    class="single__crs__content tab-pane fade clearfix"
                                >
                                    <div class="single__crs__details">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the
                                            industry’s standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has
                                            survived not only five centuries, but also the leap
                                            into electronic typesetting, remaining essentially
                                            unchanged.
                                        </p>
                                    </div>
                                </div>
                                <div
                                    id="test_4"
                                    role="tabpanel"
                                    class="single__crs__content tab-pane fade clearfix"
                                >
                                    <div class="single__crs__details">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the
                                            industry’s standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has
                                            survived not only five centuries, but also the leap
                                            into electronic typesetting, remaining essentially
                                            unchanged.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Courses Details Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Courses Details Area -->
    <div class="js-footer"></div>
@endsection

