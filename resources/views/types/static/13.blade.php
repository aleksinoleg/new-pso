@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/category.min.css">
    <link rel="stylesheet" href="/css/discount.min.css">
    <style>
        h1{
            font-size: 36px !important;
            text-align: center !important;
            color: #305c07 !important;
            font-family: "Century Gothic Regular Bold" !important;
        }
    </style>
@endsection

@section('content')
    @if(session()->has('success')&&session('success')==11)
        <div class="container">
            <div class="modal fade modal_review_sent">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 100%; max-width: 767px">
                        <div class="modal-body relative">
                            <button type="button" class="absolute close_modal" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <div class="modal_review_logo">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                            <div class="thx_rev_promocod">
                                <div class="margin_auto">
                                    <p>{{$L->__('Thank You promocod')}}</p>
                                    <p>{{$L->__('For sharing your experiences with us! promocod')}}</p>
                                    {{$L->__('Your comment will be visible after promocod')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?session()->forget('success')?>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 left_warp">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="category discount">
                    <div class="social_block social_block_hidden">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <h1>{{$page->title}}</h1>
                    <p>{!! $page->short_desc !!}</p>

                    <div class="error_email_2">{{$L->__('Your email is already used')}}</div>
                    <div class="img_discount">
                        {!!$img->__('discount_form.jpg')!!}

                        <form action="{{url('get_discount_first_time')}}" method="post" class="get_discount_first_time_2">
                            {{csrf_field()}}
                            <input type="hidden" name="lang" value="{{$L->lang}}">
                            <div class="form-group email-form-group_2">
                                <input type="email" name="email" class="form-control email-first-time-discount_2" placeholder="{{$L->__('enter your email address')}}">
                            </div>
                            <input type="submit" name="send_coupon" value="{{$L->__('send me a coupon btn')}}">
                        </form>
                    </div>

                    <p>{!! $page->long_desc !!}</p>
                </div>
            </div>

            {{--RIGHT SIDE BAR--}}
            <div class="col-lg-3 col-md-4 col-sm-5 right_warp">
                <div class="right_sidebar right_sidebar_1">
                    <div class="social_block">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <div class="banner_section_1_right_2 vote_banner_margin">
                        <a href="{{url($L->__('cat_1_link'))}}">
                            {!!$img->__($L->lang.'_gift.jpg')!!}
                            {{--{!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}--}}
                        </a>
                    </div>
                    <div class="banner_right_1">
                        <a href="{{url($L->lang.'/'.$pages->where('real_url','/'.$L->lang.'/product/18')->first()->seo_url)}}">
                            {!!$img->__($L->lang.'_sceptical.png')!!}
                        </a>
                        <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                frameborder="0" allowfullscreen>
                        </iframe>
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
                            <div class="free_delivery_text_l1">
                                {{$L->__('FREE DELIVERY')}}
                            </div>
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
@endsection

@section('footer')
    <script>

        $('.modal_review_sent').modal();

    </script>
@endsection
