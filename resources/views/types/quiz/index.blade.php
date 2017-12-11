@extends('layouts.default_wrapper')

@section('header')

    <link rel="stylesheet" href="/css/questionnaire.min.css">
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/media_home.min.css">
    <style>
        h1{
            font: inherit;
            margin: 0;
            padding: 0;
        }
        .quiz_logo{
            padding: 20px 0 0 25px;
        }
    </style>

@endsection

@section('content')
    <div class="questionnaire">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> 
                > <a href="/{{$L->lang}}/{{$L->__('quiz-main-page')}}">{{$L->__('quizzes_page')}}</a>
                > {{$page->link_name}}
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">

                    <div class="quiz_1">
                        <div class="quiz_logo"><h1 style="font-size: 16px">{{$page->title}}</h1></div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_1_question">{{$L->__($page->id.'_quiz_1_question')}}</div>
                        <div class="quiz_answer">
                            <input type="radio" name="quiz_1" id="quiz_1_1" value="30" checked>
                            <label for="quiz_1_1">{{$L->__($page->id.'_quiz_1_1')}}</label>
                            <input type="radio" name="quiz_1" id="quiz_1_2" value="60">
                            <label for="quiz_1_2">{{$L->__($page->id.'_quiz_1_2')}}</label>
                            <input type="radio" name="quiz_1" id="quiz_1_3" value="90">
                            <label for="quiz_1_3">{{$L->__($page->id.'_quiz_1_3')}}</label>
                        </div>
                        <div class="quiz_1_btn">{{$L->__('Next')}}</div>
                        <div class="restart">{{$L->__('Restart')}}</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_1">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="quiz_2">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_2_question">{{$L->__($page->id.'_quiz_2_question')}}</div>
                        <div class="quiz_answer">
                            <input type="radio" name="quiz_2" id="quiz_2_1" value="30" checked>
                            <label for="quiz_2_1">{{$L->__($page->id.'_quiz_2_1')}}</label>
                            <input type="radio" name="quiz_2" id="quiz_2_2" value="60">
                            <label for="quiz_2_2">{{$L->__($page->id.'_quiz_2_2')}}</label>
                            <input type="radio" name="quiz_2" id="quiz_2_3" value="90">
                            <label for="quiz_2_3">{{$L->__($page->id.'_quiz_2_3')}}</label>

                        </div>
                        <div class="quiz_2_btn">{{$L->__('Next')}}</div>
                        <div class="restart">{{$L->__('Restart')}}</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_2">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="quiz_3">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_3_question">{{$L->__($page->id.'_quiz_3_question')}}</div>
                        <div class="quiz_answer">
                            <input type="radio" name="quiz_3" id="quiz_3_1" value="30" checked>
                            <label for="quiz_3_1">{{$L->__($page->id.'_quiz_3_1')}}</label>
                            <input type="radio" name="quiz_3" id="quiz_3_2" value="60">
                            <label for="quiz_3_2">{{$L->__($page->id.'_quiz_3_2')}}</label>
                            <input type="radio" name="quiz_3" id="quiz_3_3" value="90">
                            <label for="quiz_3_3">{{$L->__($page->id.'_quiz_3_3')}}</label>

                        </div>
                        <div class="quiz_3_btn">{{$L->__('Next')}}</div>
                        <div class="restart">{{$L->__('Restart')}}</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_3">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="quiz_4">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_4_question">{{$L->__($page->id.'_quiz_4_question')}}</div>
                        <div class="quiz_answer">
                            <input type="radio" name="quiz_4" id="quiz_4_1" value="30" checked>
                            <label for="quiz_4_1">{{$L->__($page->id.'_quiz_4_1')}}</label>
                            <input type="radio" name="quiz_4" id="quiz_4_2" value="60">
                            <label for="quiz_4_2">{{$L->__($page->id.'_quiz_4_2')}}</label>
                            <input type="radio" name="quiz_4" id="quiz_4_3" value="90">
                            <label for="quiz_4_3">{{$L->__($page->id.'_quiz_4_3')}}</label>

                        </div>
                        <div class="quiz_4_btn">{{$L->__('Next')}}</div>
                        <div class="restart">{{$L->__('Restart')}}</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_4">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="quiz_5">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_5_question">{{$L->__($page->id.'_quiz_5_question')}}</div>
                        <div class="quiz_answer">
                            <input type="radio" name="quiz_5" id="quiz_5_1" value="30" checked>
                            <label for="quiz_5_1">{{$L->__($page->id.'_quiz_5_1')}}</label>
                            <input type="radio" name="quiz_5" id="quiz_5_2" value="60">
                            <label for="quiz_5_2">{{$L->__($page->id.'_quiz_5_2')}}</label>
                            <input type="radio" name="quiz_5" id="quiz_5_3" value="90">
                            <label for="quiz_5_3">{{$L->__($page->id.'_quiz_5_3')}}</label>

                        </div>
                        <div class="quiz_finish">{{$L->__('Finish')}}</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_5">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="res_1">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_1_answer">{{$L->__($page->id.'_quiz_1_answer')}}</div>
                        <div class="res">{!!$L->__($page->id.'_quiz_result_1')!!}</div>
                        <div class="quiz_restart">{{$L->__('Restart')}}</div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_6">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="res_2">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_2_answer">{{$L->__($page->id.'_quiz_2_answer:')}}</div>
                        <div class="res">{!!$L->__($page->id.'_quiz_result_2')!!}</div>
                        <div class="quiz_restart">{{$L->__('Restart')}}</div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_7">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <div class="res_3">
                        <div class="quiz_logo" style="font-size: 16px">{{$page->title}}</div>
                        <div class="page_content">
                            {!! $page->long_desc !!}
                        </div>
                        <div class="quiz_2_answer">{{$L->__($page->id.'_quiz_3_answer:')}}</div>
                        <div class="res">{!!$L->__($page->id.'_quiz_result_3')!!}</div>
                        <div class="quiz_restart">{{$L->__('Restart')}}</div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                    <div class="right_sidebar right_sidebar_8">
                        <div class="social_block">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                        <div class="dsp_video">
                            <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                    frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="money_back">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--BOTTOM BANER--}}
        <div class="container">
            <div class="row">
                <div class="prod_prefooter">
                    <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                            <div class="free_delivery_img float_left">
                                {!!$img->__('delivery.png')!!}
                            </div>
                            <div class="free_delivery_text float_left">
                                @if ($L->lang == 'ru')
                                    <div class="free_delivery_text_l1" style="font-size: 16px;">
                                        {{$L->__('FREE DELIVERY')}}
                                    </div>
                                @else
                                    <div class="free_delivery_text_l1">
                                        {{$L->__('FREE DELIVERY')}}
                                    </div>
                                @endif
                                <div class="free_delivery_text_l2">
                                    {{$L->__('order over $20 (rpr $2.95)')}}
                                </div>
                            </div>
                            <div class="clearfix"></div></a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item result_section col-lg-3 col-sm-6 relative">
                        <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}"><div class="result_img float_left">
                                {!!$img->__('back-money.png')!!}
                            </div>
                            <div class="result_text float_left">
                                <div class="result_text_l1">
                                    {{$L->__('result in')}} <span>{{$L->__('30 DAYS')}}</span>
                                </div>
                                <div class="result_text_l2">
                                    {{$L->__('or_your money back')}}
                                </div>
                            </div>
                            <div class="clearfix"></div></a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item contact_section col-lg-3 col-sm-6 relative">
                        <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{!!$img->__($L->lang.'_contact.png')!!}</a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item local_store_section col-lg-3 col-sm-6 relative">
                        {{--@if ($L->lang == 'cz')--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}"  style="max-width: 100%;"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                        {{--<div class="local_store_text float_left" style="padding-left: 10px; padding-top: 15px;">--}}
                        {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                        {{--<div class="local_store_text_l2" style="font-size: 17px;">{{$L->__('STORE FINDER')}}</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div></a>--}}
                        {{--@elseif($L->lang == 'ru')--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                        {{--<div class="local_store_text float_left" style="padding-top: 10px;">--}}
                        {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                        {{--<div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div></a>--}}
                        {{--@else--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                        {{--<div class="local_store_text float_left">--}}
                        {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                        {{--<div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div></a>--}}
                        {{--@endif--}}
                        <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                            <div class="l2_3_2">
                                <div class="float_left">{!! $img->__('online.png', 'l2_3_2_img') !!}{!! $img->__('online_mob.png', 'l2_3_2_img_mob') !!}</div>
                                <div class="float_left l2_3_2_text">
                                    <span class="l2_3_2_text_1">{{$L->__('Online')}}</span>
                                    <span class="l2_3_2_text_2">{{$L->__('STORE_1')}}</span>
                                </div>
                            </div>
                        </a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        $('.quiz_1_btn').click(function () {
            $('.quiz_2').show();
            $('.quiz_1').hide();
            $('.right_sidebar_2').show();
            $('.right_sidebar_1').hide();
        });
        $('.quiz_2_btn').click(function () {
            $('.quiz_3').show();
            $('.quiz_2').hide();
            $('.right_sidebar_3').show();
            $('.right_sidebar_2').hide();
        });
        $('.quiz_3_btn').click(function () {
            $('.quiz_4').show();
            $('.quiz_3').hide();
            $('.right_sidebar_4').show();
            $('.right_sidebar_3').hide();
        });
        $('.quiz_4_btn').click(function () {
            $('.quiz_5').show();
            $('.quiz_4').hide();
            $('.right_sidebar_5').show();
            $('.right_sidebar_4').hide();
        });
        $('.quiz_5_btn_back').click(function () {
            $('.quiz_4').show();
            $('.quiz_5').hide();
            $('.right_sidebar_4').show();
            $('.right_sidebar_5').hide();
        });
        $('.quiz_4_btn_back').click(function () {
            $('.quiz_3').show();
            $('.quiz_4').hide();
            $('.right_sidebar_3').show();
            $('.right_sidebar_4').hide();
        });
        $('.quiz_3_btn_back').click(function () {
            $('.quiz_2').show();
            $('.quiz_3').hide();
            $('.right_sidebar_2').show();
            $('.right_sidebar_3').hide();
        });
        $('.quiz_2_btn_back').click(function () {
            $('.quiz_1').show();
            $('.quiz_2').hide();
            $('.right_sidebar_1').show();
            $('.right_sidebar_2').hide();
        });
        $('.quiz_finish').click(function () {
            var a = 0;
            $('input:checked').each(function () {
                a = a+parseInt($(this).val());
            });
            a = a/5;
            $('.quiz_5').hide();
            $('.right_sidebar_5').hide();
            if(a<45){
                $('.res_1').show();
                $('.right_sidebar_6').show();
            }
            if(a>44 && a<75){
                $('.res_2').show();
                $('.right_sidebar_7').show();
            }
            if(a>74){
                $('.res_3').show();
                $('.right_sidebar_8').show();
            }
            $('.quiz_restart').show();
        });
        $('.quiz_restart').click(function () {
            location.reload();
        });
        $('.restart').click(function () {
            location.reload();
        });
    </script>
@endsection
