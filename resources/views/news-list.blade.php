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
                        @foreach($newsPosts as $newsPost)
                        <div class="col-xs-12">
                            <div class="single__list__view clearfix">
                                <div class="row" style="width:100%">
                                    <div class="col-md-5 col-lg-5 col-xs-12 col-sm-5">
                                        <div class="single__list">
                                            <a href="/news-post/{{$newsPost['id']}}">
                                                <img
                                                    class="single__list"
                                                    src="{{$newsPost['image'] ? $newsPost['image']['url'] : ''}}"
                                                    alt="list view images"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                                        <div class="list__view__inner">
                                            <div class="lst__view__details">
                                                <h2>
                                                    <a href="/news-post/{{$newsPost['id']}}"
                                                    >{!! $newsPost['title'] !!}</a
                                                    >
                                                </h2>
                                                <div class="lst__view__date">
                                                    Ngày đăng: <span>{{$newsPost['created_at']}}</span>
                                                </div>
                                                <div class="detail__text" style="word-break:break-all">
                                                    {!! Str::limit($newsPost['content'], 300) !!}
                                                </div>
                                            </div>
                                            <div class="list__btn">
                                                <a class="htc__btn btn--theme" href="/news-post/{{$newsPost['id']}}"
                                                >Xem chi tiết</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                                        <a href="/news-list/1">Kinh nghiệm học tiếng Nhật</a>
                                    </h4>
                                </div>
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title">
                                        <a href="/news-list/2">Văn Hóa Nhật Bản</a>
                                    </h4>
                                </div>
                                <div class="sidebar-news__item">
                                    <h4 class="sidebar-news__title">
                                        <a href="/news-list/3">Tin Tức sự kiện</a>
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
