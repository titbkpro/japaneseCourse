@extends('layouts.main-page')

@section('content')
    <!-- Start Courses Grid Area -->
    <section class="htc__courses__grid bg__white ptb--80">
        <div class="container">
            <!-- Start Tab Content -->
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="news-detail">
                                <div class="news-detail__title">
                                    {{ $newsPost['title'] }}
                                </div>
                                <div class="news-detail__body" style="word-break:break-all">
                                    {!! $newsPost['content'] !!}
                                </div>
                            </div>
                            <div class="hotro-p">
                                <div class="row">
                                    <div
                                        class="hotro-img text-right text-center col-md-2 align-midle mb-5"
                                    >
                                        <img
                                            src="https://tiengnhatcolam.vn/images/logo-footer.png"
                                            alt=""
                                        />
                                    </div>
                                    <div class="hotro-p-content col-md-10">
                                        <div class="tel">
                                            <i class="icon ion-iphone"></i>
                                            <a href="tel:037 223 2268">037 223 2268</a>
                                        </div>
                                        <p class="font13">
                                            Hãy gọi cho chúng tôi nếu bạn đang có vấn đề về da cần
                                            được giải đáp <br />
                                            Hoặc bấm <a href="">ĐĂNG KÝ TƯ VẤN</a> chúng tôi sẽ hỗ
                                            trợ ngay cho bạn
                                            <br />
                                            Hoặc gửi thư qua:
                                            <a href="mailto:tuvan.tiengnhatcolam@gmail.com"
                                            >tuvan.tiengnhatcolam@gmail.com</a
                                            >
                                            nếu bạn muốn kể chi tiết hơn
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                    <div class="htc__blog__right__sidebar">
                        <div class="sidebar-news">
                            <ul class="sidebar-news__list">
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title active">
                                        <a href="">Kinh nghiệm học tiếng Nhật</a>
                                    </h4>
                                </div>
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title">
                                        <a href="">Văn Hóa Nhật Bản</a>
                                    </h4>
                                </div>
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title">
                                        <a href="">Tin Tức sự kiện</a>
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
