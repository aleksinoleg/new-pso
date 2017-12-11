<?
$quizzes = \App\Page::where('lang',$L->lang)
->where('active',1)
->where('type','quiz')
->get();
?>

@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/category.min.css">
    <link rel="stylesheet" href="/css/styl/faq.css">

@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-7 left_warp">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="local_top_logo" style="text-transform: inherit">
                    <h1 style="max-width: 190px; font-size: 16px">{{$page->title}}</h1>
                </div>
                <div class="short_desc">
                    {{$page->short_desc}}
                </div>
                <div class="long_desc">
                    {!! $page->long_desc !!}
                </div>
                @foreach($quizzes as $quiz)
                    <div class="faq_q">
                        <p>
                            <a href="/{{$L->lang}}/{{$quiz->seo_url}}">
                                <img class="faq_right" src="/images/lang/en/static/arrow_right_faq.png" style="height:25px; width:25px">
                                <strong>{{$quiz->link_name}}</strong>
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 right_warp">
                <div class="right_sidebar right_sidebar_1">
                    <div class="social_block">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <div class="banner_right_1">
                        <a href="{{url($L->lang.'/'.$L->__('package-for-scepticals'))}}">
                            {!!$img->__($L->lang.'_sceptical.png')!!}
                        </a>
                    </div>
                    <div class="banner_right_2">
                        <a href="{{url($L->lang.'/'.$L->__('over-20-natural-active-ingredients'))}}">
                            {!!$img->__($L->lang.'_psoriasis_treatment.jpg')!!}
                        </a>
                    </div>
                    <div class="banner_right_3">
                        <a href="{{url($L->lang.'/'.$L->__('what-is-psoriasis'))}}">
                            {!!$img->__($L->lang.'_what_is_pso.jpg')!!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')



@endsection
