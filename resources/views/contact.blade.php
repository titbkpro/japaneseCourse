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
                            {!! $contact->contact_detail !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40">
                    <div class="htc__contact__form__wrap">
                        <h2 class="contact__title">Gửi phản hồi</h2>
                        <div class="contact-form-wrap">
                            <form id="contact-form" action="{{route('contact_store')}}" method="post">
                                {{ csrf_field() }}
                                <div class="single-contact-form name">
                                    <div class="contact-box name_email">
                                        <input
                                            type="text"
                                            name="name" 
                                            value="{{old('name')}}"
                                            placeholder="Tên của bạn*"
                                        />
                                        <input
                                            type="text"
                                            placeholder="Số điện thoại*"
                                            onkeypress="return isNumberKey(event)"
                                            maxlength="11"
                                            name="phone_number"
                                            value="{{ old('phone_number') }}"
                                        />
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box subject">
                                        <input
                                            type="text"
                                            placeholder="Địa chỉ email*"
                                            name="email" 
                                            value="{{old('email') }}"
                                        />
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea
                                            placeholder="Thông điệp"
                                            name="note" value="{{ old('note')}}"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="htc__btn btn--theme">
                                        Gửi đi
                                    </button>
                                </div>
                                <div class="form-output">
                                    @if($errors->any()) hahaha
                                        {!! implode('', $errors->all('<div class="form-messege">:message</div>')) !!}
                                    @endif
                                </div>
                            </form>
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
    <script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
            return false;
        return true;
      }
    </script>
@endsection
