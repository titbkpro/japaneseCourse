<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from preview.hasthemes.com/educan/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Aug 2020 15:40:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Owl Carousel fremwork main css -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- This core.css file contents all plugings css file. -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <!-- Theme shortcodes/elements style -->
    <link href="{{ asset('css/shortcode/shortcodes.css') }}" rel="stylesheet">
    <!-- Theme main style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-2.css') }}" rel="stylesheet">
    <!-- Responsive css -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!-- User style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <div id="htc__header" class="htc-header header--one">
        <!-- Start Header Top -->
        <div class="htc__header__top bg__theme hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="header__top__left">
                            <ul class="header__address">
                                <li><a href="tel:+00123456789"><i class="icon ion-android-call"></i>(+00) 123 456 789</a></li>
                                <li><a href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i>support@yourmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="header__top__right">
                            <ul class="social__icon">
                                <li><a href="https://twitter.com/devitemsllc" target="_blank"><i class="icon ion-social-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/devitems/" target="_blank"><i class="icon ion-social-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="icon ion-social-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="icon ion-social-googleplus"></i></a></li>
                            </ul>
                            <ul class="login__register">
                                <li><a href="register.html">Đăng ký</a></li>
                                <li><a href="login.html">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__area bg__white d-none d-md-block sticky__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-12">
                        <div class="logo">
                            <a href="../home">
                                <img src="images/logo/2.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <!-- Start MAinmenu Ares -->
                    <div class="col-md-10 col-lg-10 col-sm-12">
                        <nav class="mainmenu__nav">
                            <ul class="main__menu">
                                <li class="drop"><a href="../course">KHÓA HỌC</a>
                                    <ul class="dropdown">
                                        <li><a href="../course">KHÓA HỌC ĐƠN</a></li>
                                        <li><a href="../course">KHÓA HỌC COMBO</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a href="../news">TIN TỨC</a>
                                    <ul class="dropdown">
                                        <li><a href="../news">KINH NGHIỆM HỌC TIẾNG NHẬT</a></li>
                                        <li><a href="../news">VĂN HÓA NHẬT BẢN</a></li>
                                        <li><a href="../news">TIN TỨC SỰ KIỆN</a></li>
                                    </ul>
                                </li>
                                <li><a href="../opinion">CẢM NHẬN</a></li>
                                <li><a href="../contact">LIÊN HỆ</a></li>
                                <li><a href="../support">HỖ TRỢ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End MAinmenu Ares -->
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
        <!-- Mobile-menu-area start -->
        <div class="mobile-menu-area d-md-none d-lg-none d-xl-none">
            <div class="fluid-container mobile-menu-container">
                <div class="mobile-logo"><a href="../course"><img src="images/logo/2.png" alt="Mobile logo"></a></div>
                <div class="mobile-menu clearfix">
                    <nav id="mobile_dropdown">
                        <ul>
                            <li><a href="../course">KHÓA HỌC</a>
                                <ul>
                                    <li><a href="../course">KHÓA HỌC ĐƠN</a></li>
                                    <li><a href="../course">KHÓA HỌC COMBO</a></li>
                                </ul>
                            </li>
                            <li><a href="../news">TIN TỨC</a>
                                <ul>
                                    <li><a href="../news">KINH NGHIỆM HỌC TIẾNG NHẬT</a></li>
                                    <li><a href="../news">VĂN HÓA NHẬT BẢN</a></li>
                                    <li><a href="../news">TIN TỨC SỰ KIỆN</a></li>
                                </ul>
                            </li>
                            <li><a href="../opinion">CẢM NHẬN</a></li>
                            <li><a href="../contact">LIÊN HỆ</a></li>
                            <li><a href="../support">HỖ TRỢ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Mobile-menu-area End -->
    </div>
    <!-- End Header Style -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Content Area -->
    @yield('content')
    <!-- End Content Area -->
    <!-- Start Footer Area -->
    <footer class="htc__footer__area bg__theme">
        <div class="container">
            <!-- Start Footer Top Area -->
            <div class="htc__footer__top">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="htc__footer__inner">
                            <ul class="htc__footer__address">
                                <li><p><i class="icon ion-ios-location"></i>   01 Nguyễn Văn Linh, Hải Châu, TP. Đà Nẵng</p></li>
                                <li><a href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i> support@yourmail.com</a></li>
                                <li><a href="tel:+00123456789"><i class="icon ion-android-call"></i> (801) 2345 - 6789</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top Area -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright__area">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="copyright__inner">
                            <div class="copyright">
                                <p>© 2020<a href="../course" target="_blank">Japanese Course</a>
                                    All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </div>
    </footer>
    <!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->


<!-- jquery latest version -->
<script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- Bootstrap framework js -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- All js plugins included in this file. -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- Waypoints.min.js. -->

<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
<script>
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 12,

            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(23.7286, 90.3854), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [

                {
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#3f518c"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        },
                        {
                            "color": "#84afa3"
                        },
                        {
                            "lightness": 52
                        }
                    ]
                }
            ]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('googleMap');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(23.7286, 90.3854),
            map: map,
            title: 'Ramble!',
            animation:google.maps.Animation.BOUNCE

        });
    }
</script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{ asset('js/main.js') }}"></script>

</body>


<!-- Mirrored from preview.hasthemes.com/educan/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Aug 2020 15:42:23 GMT -->
</html>
