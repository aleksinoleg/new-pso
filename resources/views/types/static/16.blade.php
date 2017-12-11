<?
    $long_desc = explode('***', $page->long_desc);
?>

@extends('layouts.default_wrapper')

@section('header')

    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/localstore.min.css">
    <style>
        h1{
            text-align: left !important;
            color: #639e28;
            text-transform: uppercase;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 0.1px 0 #639e28;
        }
        @media screen and(max-width: 767px) {
            h1{
                font-size: 21px;
            }
        }
    </style>
@endsection

@section('content')
    {{--{{dd ($long_desc)}}--}}
    @if(session('success')==1)
        <div class="modal fade modal_localstore">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal_close">
                        <button type="button" class="modal_coupon_close modal_local_close" data-dismiss="modal"
                                aria-hidden="true">
                            <span class="close_cross">&times;</span></br>
                        </button>
                    </div>
                    <div class="modal_content">
                        <div class="modal_header">
                            {{$L->__('Thank you!')}}
                        </div>
                        <div class="local_buttons">
                            {!! $pages->where('real_url','/'.$L->lang.'/article/61')->first()->long_desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?session(['success'=>0])?>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>

                <div class="local_content">
                    <div class="local_top">
                        <div class="local_top_logo">
                            {{$L->__('Where to Buy')}}
                        </div>
                        <div class="local_social">
                            <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                            <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                        </div>
                    </div>
                    <div class="local_text">
                        <h1>{{$page->title}}</h1>
                        {{$page->short_desc}}
                    </div>
                    <div class="local_logo">
                        <div class="clearfix"></div>
                    </div>
                    <div class="local_form">
                        <form action="{{url('local-store')}}" method="post">
                            {{csrf_field()}}
                            <label for="city" class="prev_label">{{$L->__('Enter city and country:')}}</label>
                                <label for="country">
                                    <input id="country" type="text" name="country" placeholder="{{$L->__('Country...')}}" required>
                                        <span class="bg_input">
                                            {!!$img->__('icon_country.png')!!}
                                        </span>
                                </label>

                                <label for="city">
                                    <input id="city" type="text" name="city" placeholder="{{$L->__('City...')}}" required>
                                    <span class="bg_input">
                                        {!!$img->__('icon_city.png')!!}
                                    </span>
                                </label>

                            <input class="local_show" type="submit" name="send" value="{{$L->__('Show stores')}}">
                        </form>
                    </div>
                    <div class="local_question">
                        {!! $long_desc[0] or ''!!}
                        <div class="local_tel">
                            {!!$img->__('local_contacts.png', 'local-tel_desktop')!!}
                            {!!$img->__('phones_contact.png', 'local-tel_mob')!!}
                        </div>
                        {!! $long_desc[1] or ''!!}
                    </div>
                </div>
            </div>

            {{--BOTTOM BANER--}}
            <div class="col-xs-12">
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
    </div>

@endsection

@section('footer')

    {{--show modal--}}
    <script>
        $('.modal_localstore').modal('show');
    </script>

    {{--right mobile menu for localstore page--}}
    <script>
        function visible (){
            $('.static_pages_menu_item').show();
        }

        $(document).ready(function() {
            $('.menu-box_close').click(function() {
                $('.static_pages_menu_list').css({
                    width:'300px'
                });
                $('.static_pages_menu_list').animate({
                    opacity:'0.9'
                }, 500);

                setTimeout(visible, 300);

                $('.menu-box_close').hide();
                $('.menu-box_activ').show();
            });

            $('.menu-box_activ').click(function() {
                $('.static_pages_menu_list').css({
                    width:'0'
                });
                $('.static_pages_menu_list').animate({
                    opacity:'0'
                }, 500);
                $('.static_pages_menu_item').hide();

                $('.menu-box_activ').hide();
                $('.menu-box_close').show();
            });
        });
    </script>

@endsection
