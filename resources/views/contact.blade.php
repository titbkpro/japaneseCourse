@extends('layouts.page')

@section('content')
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--80 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="contact__wrap">
                    <h2 class="title__style--2">Thông tin liên hệ</h2>
                    <p>Vui lòng điền đầy đủ thông tin cần liên hệ. Chúng tôi sẽ cố gắng hồi đáp nhanh nhất yêu cầu của Quý khách hàng. </p>
                    <div class="htc__contact__inner">
                        <!-- Start Single Address -->
                        <div class="contact__address">
                            <div class="cont__icon">
                                <i class="icon ion-ios-calendar"></i>
                                <span>THỜI GIAN LÀM VIỆC:</span>
                            </div>
                            <p>Từ thứ Hai đến thứ Bảy hàng tuần</p>
                            <p>Sáng 8h00 - 12h00, Chiều 13h00 - 17h00</p>
                        </div>
                        <!-- Start Single Address -->
                        <div class="contact__address">
                            <div class="cont__icon">
                                <i class="icon ion-ios-calendar"></i>
                                <span>THỜI GIAN TIẾP NHẬN THÔNG TIN:</span>
                            </div>
                            <p>Từ thứ Hai đến thứ Bảy hàng tuần</p>
                            <p>Sáng 8h00 - 12h00, Chiều 13h00 - 17h00</p>
                        </div>
                        <!-- End Single Address -->
                        <!-- Start Single Address -->
                        <div class="contact__address">
                            <div class="cont__icon">
                                <i class="icon ion-android-call"></i>
                                <span>THÔNG TIN LIÊN HỆ:</span>
                            </div>
                            <p><a href="tel:+00123456789">(801) 2345 - 6789</a></p>
                            <p><a href="mailto:www.yourmail.com">support@yourmail.com</a></p>
                        </div>
                        <!-- End Single Address -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40">
                <div class="htc__contact__form__wrap">
                    <h2 class="contact__title">Gửi tin nhắn</h2>
                    <div class="contact-form-wrap">
                        <form id="contact-form" action="http://preview.hasthemes.com/educan/mail.php" method="post">
                            <div class="single-contact-form name">
                                <div class="contact-box name_email">
                                    <input type="text" name="name" placeholder="Tên của bạn *">
                                    <input type="email" name="email" placeholder="Email của bạn *">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box subject">
                                    <input type="text" name="subject" placeholder="Tiêu đề *">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box message">
                                    <textarea name="message"  placeholder="Tin nhắn"></textarea>
                                </div>
                            </div>
                            <div class="contact-btn">
                                <button type="submit" class="htc__btn btn--theme">Gửi</button>
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
@endsection
