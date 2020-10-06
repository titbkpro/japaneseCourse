@extends('layouts.main-page')

@section('content')
    <section class="htc__contact__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="contact__wrap">
                        <h2 class="title__style--2">Thông tin liên hệ</h2>
                        <p>
                            Vui lòng điền đầy đủ thông tin cần liên hệ. Lamsens sẽ cố gắng
                            hồi đáp nhanh nhất yêu cầu của Quý khách hàng.
                        </p>
                        <div class="htc__contact__inner">
                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="icon ion-ios-calendar"></i>
                                    <span>THỜI GIAN LÀM VIỆC</span>
                                </div>
                                <p>Từ thứ Hai đến thứ Bảy hàng tuần</p>
                                <p>Sáng 8h00 - 12h00, Chiều 13h00 - 17h00</p>
                            </div>
                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="icon ion-ios-location"></i>
                                    <span>ĐỊA CHỈ</span>
                                </div>
                                <p>Đào Thanh Lam</p>
                                <p>Phố Xuân Đỗ, Phường Cự Khối, Quận Long Biên, Hà Nội</p>
                            </div>
                            <div class="contact__address">
                                <div class="cont__icon">
                                    <i class="icon ion-android-call"></i>
                                    <span>HOTLINE</span>
                                </div>
                                <p>
                                    <a class="contact__tel" href="tel:037 223 2268"
                                    >037 223 2268</a
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40"
                >
                    <div class="htc__contact__form__wrap">
                        <h2 class="contact__title">Gửi phản hồi</h2>
                        <div class="contact-form-wrap">
                            <form
                                id="contact-form"
                                action="http://preview.hasthemes.com/educan/mail.php"
                                method="post"
                            >
                                <div class="single-contact-form name">
                                    <div class="contact-box name_email">
                                        <input
                                            type="text"
                                            name="name"
                                            placeholder="Tên của bạn*"
                                        />
                                        <input
                                            type="tel"
                                            name="tel"
                                            placeholder="Số điện thoại*"
                                        />
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box subject">
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="Địa chỉ email*"
                                        />
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                        <textarea
                            name="message"
                            placeholder="Thông điệp"
                        ></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="htc__btn btn--theme">
                                        Gửi đi
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->
    <!-- Start our Google Map Area -->
    <div class="map-contacts">
        <div id="googleMap"></div>
    </div>
    <!-- End our Google Map Area -->
    <div class="js-footer"></div>
@endsection
