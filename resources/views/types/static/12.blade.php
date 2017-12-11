@extends('layouts.default_wrapper')

@section('header')

    <link rel="stylesheet" href="/css/questionnaire.min.css">
    <link rel="stylesheet" href="/css/styl/home_page.css">

@endsection

@section('content')
    <div class="questionnaire">
<div class="container">
    <div class="breadcrumbs">
        <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
                <div class="quiz_1">
                    <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                    <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                    <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                    <div class="quiz_1_question">{{$L->__('quiz_1_question')}}</div>
                    <div class="quiz_answer">
                        <input type="radio" name="quiz_1" id="quiz_1_1" value="0" checked>
                        <label for="quiz_1_1">{{$L->__('quiz_1_1')}}</label>
                        <input type="radio" name="quiz_1" id="quiz_1_2" value="30">
                        <label for="quiz_1_2">{{$L->__('quiz_1_2')}}</label>
                        <input type="radio" name="quiz_1" id="quiz_1_3" value="60">
                        <label for="quiz_1_3">{{$L->__('quiz_1_3')}}</label>
                        <input type="radio" name="quiz_1" id="quiz_1_4" value="100">
                        <label for="quiz_1_4">{{$L->__('quiz_1_4')}}</label>
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
                        <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">
                            {!!$img->__($L->lang.'_money-back-new.jpg')!!}
                            {!!$img->__($L->lang.'_money-back-new_mob.jpg', 'money-back-new-mob')!!}
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
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_2_question">{{$L->__('quiz_2_question')}}</div>
                <div class="quiz_answer">
                    <input type="radio" name="quiz_2" id="quiz_2_1" value="0" checked>
                    <label for="quiz_2_1">{{$L->__('quiz_2_1')}}</label>
                    <input type="radio" name="quiz_2" id="quiz_2_2" value="30">
                    <label for="quiz_2_2">{{$L->__('quiz_2_2')}}</label>
                    <input type="radio" name="quiz_2" id="quiz_2_3" value="60">
                    <label for="quiz_2_3">{{$L->__('quiz_2_3')}}</label>
                    <input type="radio" name="quiz_2" id="quiz_2_4" value="100">
                    <label for="quiz_2_4">{{$L->__('quiz_2_4')}}</label>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="quiz_3">
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_3_question">{{$L->__('quiz_3_question')}}</div>
                <div class="quiz_answer">
                    <input type="radio" name="quiz_3" id="quiz_3_1" value="0" checked>
                    <label for="quiz_3_1">{{$L->__('quiz_3_1')}}</label>
                    <input type="radio" name="quiz_3" id="quiz_3_2" value="30">
                    <label for="quiz_3_2">{{$L->__('quiz_3_2')}}</label>
                    <input type="radio" name="quiz_3" id="quiz_3_3" value="60">
                    <label for="quiz_3_3">{{$L->__('quiz_3_3')}}</label>
                    <input type="radio" name="quiz_3" id="quiz_3_4" value="100">
                    <label for="quiz_3_4">{{$L->__('quiz_3_4')}}</label>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="quiz_4">
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_4_question">{{$L->__('quiz_4_question')}}</div>
                <div class="quiz_answer">
                    <input type="radio" name="quiz_4" id="quiz_4_1" value="0" checked>
                    <label for="quiz_4_1">{{$L->__('quiz_4_1')}}</label>
                    <input type="radio" name="quiz_4" id="quiz_4_2" value="30">
                    <label for="quiz_4_2">{{$L->__('quiz_4_2')}}</label>
                    <input type="radio" name="quiz_4" id="quiz_4_3" value="60">
                    <label for="quiz_4_3">{{$L->__('quiz_4_3')}}</label>
                    <input type="radio" name="quiz_4" id="quiz_4_4" value="100">
                    <label for="quiz_4_4">{{$L->__('quiz_4_4')}}</label>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="quiz_5">
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_5_question">{{$L->__('quiz_5_question')}}</div>
                <div class="quiz_answer">
                    <input type="radio" name="quiz_5" id="quiz_5_1" value="0" checked>
                    <label for="quiz_5_1">{{$L->__('quiz_5_1')}}</label>
                    <input type="radio" name="quiz_5" id="quiz_5_2" value="30">
                    <label for="quiz_5_2">{{$L->__('quiz_5_2')}}</label>
                    <input type="radio" name="quiz_5" id="quiz_5_3" value="60">
                    <label for="quiz_5_3">{{$L->__('quiz_5_3')}}</label>
                    <input type="radio" name="quiz_5" id="quiz_5_4" value="100">
                    <label for="quiz_5_4">{{$L->__('quiz_5_4')}}</label>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="res_1">
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_1_answer">{{$L->__('quiz_1_answer:')}}</div>
                <div class="res">{!!$L->__('quiz_result_1')!!}</div>
                <div class="quiz_restart">{{$L->__('Restart')}}</div>
                <a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}" style="position: relative; top:0">
                    <div class="quiz_discount">{{$L->__('Get your')}}<span>{{$L->__('50% Discount')}}</span></div>
                </a>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="res_2">
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_2_answer">{{$L->__('quiz_2_answer:')}}</div>
                <div class="res">{!!$L->__('quiz_result_2')!!}</div>
                <div class="quiz_restart">{{$L->__('Restart')}}</div>
                {{--<a href="{{url($L->lang.'/'.$L->__('kit-for-scepticals'))}}" style="position: relative; top:0">--}}
                    {{--@if($L->lang == 'ru')--}}
                        {{--<div class="quiz_discount" style="line-height: 1;">{{$L->__('Get a Free One-Week')}}--}}
                            {{--<span>{{$L->__('PSOEASY TRIAL KIT')}}</span>--}}
                        {{--</div>--}}
                    {{--@else--}}
                        {{--<div class="quiz_discount">{{$L->__('Get a Free One-Week')}}--}}
                            {{--<span>{{$L->__('PSOEASY TRIAL KIT')}}</span>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</a>--}}
                <a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}" style="position: relative; top:0">
                    <div class="quiz_discount">{{$L->__('Get your')}}<span>{{$L->__('50% Discount')}}</span></div>
                </a>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="res_3">
                <div class="quiz_logo">{{$L->__('HOW SCEPTICAL')}}<span>{{$L->__('are you?')}}</span></div>
                <a class="like" href="#">{!!$img->__('test_like.png')!!}</a>
                <a class="share" href="#">{!!$img->__('test_share.png')!!}</a>
                <div class="quiz_3_answer">{{$L->__('quiz_3_answer:')}}</div>
                <div class="res">{!!$L->__('quiz_result_3')!!}</div>
                <div class="quiz_restart">{{$L->__('Restart')}}</div>
                {{--<a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}" style="position: relative; top:0">--}}
                    {{--@if ($L->lang == 'ru')--}}
                        {{--<div class="quiz_discount">{{$L->__('Results in 30 DAYS or')}}--}}
                            {{--<span style="font-size: 15px;">{{$L->__('YOUR MONEY BACK')}}</span>--}}
                        {{--</div>--}}
                    {{--@else--}}
                        {{--<div class="quiz_discount">{{$L->__('Results in 30 DAYS or')}}--}}
                            {{--<span>{{$L->__('YOUR MONEY BACK')}}</span>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</a>--}}
                <a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}" style="position: relative; top:0">
                    <div class="quiz_discount">{{$L->__('Get your')}}<span>{{$L->__('50% Discount')}}</span></div>
                </a>
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
                <div class="money_back"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{!!$img->__($L->lang.'_money-back-new.jpg')!!}</a></div>
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
            if(a<34){
                $('.res_1').show();
                $('.right_sidebar_6').show();
            }
            if(a>33 && a<67){
                $('.res_2').show();
                $('.right_sidebar_7').show();
            }
            if(a>66){
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
