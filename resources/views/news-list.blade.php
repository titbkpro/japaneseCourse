@extends('layouts.main-page')

@section('content')
    <section class="htc__courses__grid bg__white ptb--80">
        <div class="container">
            <!-- Start Tab Menu -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="courses__tab__wrap">
                        <div class="courses__grid__inner justify-content-end py-2">
                            <div class="courses__searsh__box">
                                <input type="text" placeholder="Tim bài viết..." />
                                <a href="#"><i class="icon ion-ios-search-strong"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Menu -->
            <!-- Start Tab Content -->
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="single__list__view clearfix">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 col-xs-12 col-sm-5">
                                        <div class="single__list">
                                            <a href="bai-viet.html">
                                                <img
                                                    src="https://tiengnhatcolam.vn/storage/posts/March2019/p6yTOOpycyt3FmpoqZlF.png"
                                                    alt="list view images"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                                        <div class="list__view__inner">
                                            <div class="lst__view__details">
                                                <h2>
                                                    <a href="bai-viet.html"
                                                    >Cách chuyển tên sang tiếng Nhật</a
                                                    >
                                                </h2>
                                                <div class="lst__view__date">
                                                    Ngày đăng: <span>24/8/2020</span>
                                                </div>
                                                <p>
                                                    Tên người Nhật thì thường được viết bằng chữ Kanji
                                                    và phiên âm sang Hiragana. Còn chúng ta là người
                                                    nước ngoài thì sẽ phải dùng chữ Katakana để phiên
                                                    âm. Phiên âm có nghĩa là chúng ta sẽ tìm một từ có
                                                    sẵn trong tiếng Nhật có cách đọc giống với cách
                                                    phát âm trong tiếng Việt nhất để đọc ra tên chúng
                                                    ta.
                                                </p>
                                            </div>
                                            <div class="list__btn">
                                                <a class="htc__btn btn--theme" href="bai-viet.html"
                                                >Xem chi tiết</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="single__list__view clearfix">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 col-xs-12 col-sm-5">
                                        <div class="single__list">
                                            <a href="bai-viet.html">
                                                <img
                                                    src="https://tiengnhatcolam.vn/storage/posts/February2019/Ie3Vdl8gy11ykWGuIRYw.jpg"
                                                    alt="list view images"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                                        <div class="list__view__inner">
                                            <div class="lst__view__details">
                                                <h2>
                                                    <a href="bai-viet.html"
                                                    >Những lý do khiến bạn muốn học tiếng Nhật ngay
                                                        lập tức</a
                                                    >
                                                </h2>
                                                <div class="lst__view__date">
                                                    Ngày đăng: <span>24/8/2020</span>
                                                </div>
                                                <p>
                                                    Học tiếng Nhật là một trong số những cách sẽ giúp
                                                    bạn gia tăng khả năng cạnh tranh và dễ dàng kiếm
                                                    việc với mức lương như ý. Vậy lý do để bạn học
                                                    tiếng Nhật là gì?
                                                </p>
                                            </div>
                                            <div class="list__btn">
                                                <a class="htc__btn btn--theme" href="bai-viet.html"
                                                >Xem chi tiết</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <ul class="htc-pagination clearfix">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li>
                                    <a href="#"><i class="icon ion-ios-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                    <div class="htc__blog__right__sidebar">
                        <div class="sidebar-news">
                            <ul class="sidebar-news__list">
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title active">
                                        <a href="./news-list">Kinh nghiệm học tiếng Nhật</a>
                                    </h4>
                                </div>
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title">
                                        <a href="./news-list">Văn Hóa Nhật Bản</a>
                                    </h4>
                                </div>
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title">
                                        <a href="./news-list">Tin Tức sự kiện</a>
                                    </h4>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
    </section>
    <!-- End Courses Grid Area -->
    <div class="js-footer"></div>
@endsection
