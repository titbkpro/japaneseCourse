@extends('layouts.main-page')

@section('content')
    <section class="comment-box pt--80 pb--110">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="section__title text-center section--white">
                        <h2 class="title__line">{{$info->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="support">
                        <ul class="support__list">
                        @foreach($informationDetails as $informationDetail)
                            <li class="support__item">
                                <h3 class="support__title">{{$informationDetail['title']}}</h3>
                                <ul class="support__content active">
                                    {!! $informationDetail['content'] !!}
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="js-footer"></div>
@endsection
