@extends('layouts.page')

@section('content')
    <div class="slider">
        <div class="slide">
            <img src="images/opinion/opinion1.jpg" alt="" class="img-responsive" />
        </div>
        <div class="slide">
            <img src="images/opinion/opinion2.jpg" alt="" class="img-responsive" />
        </div>
        <div class="slide">
            <img src="images/opinion/opinion3.jpg" alt="" class="img-responsive" />
        </div>
        <div class="slide">
            <img src="images/opinion/opinion4.jpg" alt="" class="img-responsive" />
        </div>
        <div class="slide">
            <img src="images/opinion/opinion5.jpg" alt="" class="img-responsive" />
        </div>
        <div class="slide">
            <img src="images/opinion/opinion6.jpg" alt="" class="img-responsive" />
        </div>
        <div class="slide">
            <img src="images/opinion/opinion7.jpg" alt="" class="img-responsive" />
        </div>
    </div>

    <script>
        window.onload=function(){
            $('.slider').slick({
                centerMode: true,
                centerPadding: '10px',
                autoplay:true,
                autoplaySpeed:1500,
                arrows:true,
                centerMode:true,
                slidesToShow:4,
                slidesToScroll:2,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        };
    </script>
@endsection
