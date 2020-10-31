@extends('layouts.main-page')

@section('content')
    <div class="our__portfolio__area bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">CÁC KHÓA HỌC ĐƠN</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="htc__popular__courses__wrap">
                    @foreach($courses as $course)
                    <div class="pro-item col-md-6 col-sm-6 col-lg-4 col-xs-12">
                        <div class="courses">
                            <div class="courses__thumb">
                                <a href="#"><img src="https://tiengnhatcolam.vn/storage/courses/May2020/1GDq8MeNlTupo4eAdSN7.png"
                                                 alt="courses images" /></a>
                                <div class="courses__hover__info">
                                    <div class="courses__hover__action">
                                        <div class="courses__hover__thumb">
                                            <img src="images/course/sm-img/1.png" alt="small images" />
                                        </div>
                                        <p>Giảng viên</p>
                                        <span class="crs__separator">/</span>
                                        <h4><a href="#">Lê Thị Lam</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="courses__details">
                                <div class="courses__details__inner">
                                    <h2 class="courses__details__title">
                                        <a href="#">{{$course['name']}}</a>
                                    </h2>
                                    <p>
                                    <div class="d-flex justify-content-between">
                                        <a class="htc__btn btn--theme mr-2" href="#">Chi tiết</a>
                                        <a class="htc__btn btn--theme" href="#"><i class="icon ion-bag mr-2"></i>Mua
                                            khoá học</a>
                                    </div>
                                    </p>
                                </div>
                                <ul class="courses__meta">
                                    <li>
                                        <i class="icon ion-calendar"></i>Thời gian học: <span class="highlight">{{$course['time']}}</span>
                                    </li>
                                    <li class="crs__video"><i class="icon ion-ios-play"></i> Số video: <span class="highlight">120</span></li>
                                    <li class="crs__price">Học phí: <span>{{$course['fee']}}</span> <del>{{$course['sale_off'] ? $course['sale_off'] : '0'}}</del></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="js-footer"></div>
@endsection

