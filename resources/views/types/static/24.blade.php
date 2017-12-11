@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/registry.min.css">
    <link rel="stylesheet" href="/css/contact-us.min.css">
@endsection

@section('content')
    @if(session('success') == 1)
        <div class="container">
            <div class="modal fade modal_review_sent">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 100%; max-width: 767px; height: 104px">
                        <div class="modal-body relative">
                            <button type="button" class="absolute close_modal" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <div class="pull-left">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                            <div class="pull-right thx_rev flex">
                                <div class="margin_auto" style="padding-right: 45px">
                                    {{$L->__('Thank You for your message/question!')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?
        session(['success' => 0])
        ?>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="login_title">
                    {{$page->title}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
                <div class="login_form form">
                    <div class="form_title">
                        {{$L->__('aff_title')}}
                    </div>
                    <form action="{{url('/admin/toMail')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="lang" value="{{$L->lang}}">
                        <input type="hidden" name="type" value="affiliate">
                        <label for="text">{{$L->__('aff_input_1')}}</label>
                        <div class="input in_name">
                            <input type="text" name="name" id="text" required>
                        </div>
                        <label for="email">{{$L->__('aff_input_2')}}</label>
                        <div class="input in_email">
                            <input type="email" name="email" id="email" required>
                        </div>
                        <label for="tel">{{$L->__('aff_input_3')}}</label>
                        <div class="input in_tel">
                            <input type="tel" name="tel" id="tel"  pattern="^[ 0-9\s\+\-]+$">
                        </div>
                        <label for="message">{{$L->__('aff_input_4')}}</label>
                        <div class="input in_text">
                            <textarea name="message" id="message" required></textarea>
                         </div>
                        <div style="padding-left: 40px"><input type="submit" name="send" value="{{$L->__('aff_input_5')}}"></div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
                <div class="phones">
                    {!!$img->__('phones_contact.png')!!}
                    <div class="buttons">
                        <a href="/{{$L->lang.'/'.$L->__('affiliate-program')}}" class=" online_btn">
                            <span>{{$L->__('Affiliate program')}}</span>
                            <span>{{$L->__('for ONLINE partners')}}</span>
                        </a>
                        <a href="/{{$L->lang.'/'.$L->__('partner-program')}}" class="local_btn">
                            <span>{{$L->__('Be our partner')}}</span>
                            <span>{{$L->__('for LOCAL STORE')}}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                    <div class="smm_contact">
                        <a href="{{($L->lang == 'ru')?'#':$L->__('link_soc_youtube_contact')}}" class="contact_icon contact_y" target="_blank">{!!$img->__('youtube_icon_contact.png')!!}</a>
                        <a href="{{($L->lang == 'ru')?'#':$L->__('link_soc_fb_contact')}}" class="contact_icon contact_f" target="_blank">{!!$img->__('fb_icon_contact.png')!!}</a>
                        <a href="{{($L->lang == 'ru')?'#':$L->__('link_soc_pin_contact')}}" class="contact_icon contact_p" target="_blank">{!!$img->__('pin_icon_contact.png')!!}</a>
                        <a href="{{($L->lang == 'ru')?'#':$L->__('link_soc_tw_contact')}}" class="contact_icon contact_t" target="_blank">{!!$img->__('twitter_icon_contact.png')!!}</a>
                        <a href="{{($L->lang == 'ru')?'#':$L->__('link_soc_google_contact')}}" class="contact_icon contact_g" target="_blank">{!!$img->__('google_icon_contact.png')!!}</a>
                        <div class="clearfix"></div>
                    </div>
            </div>

            {{--BOTTOM BANER--}}
            <div class="col-xs-12 bottom_banner">
                <div class="prod_prefooter">
                    <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                            <div class="free_delivery_img float_left">
                                {!!$img->__('delivery.png')!!}
                            </div>
                            <div class="free_delivery_text float_left">
                                @if($L->lang == 'ru')
                                    <div class="free_delivery_text_l1" style="font-size: 15px; padding-top: 10px;">
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
                                    {{--<div class="local_store_text_l2" style="font-size: 16px;">{{$L->__('STORE FINDER')}}</div>--}}
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
        $('.modal_review_sent').modal();
    </script>
    <script>
        var es = "tel:+34911983544", uk = "tel:+442036702190", usa = "tel:+16469348815", de = "tel:+41435084208", fr = "tel:+33973729641",
            it = "tel:+390690280685", cz = "tel:+420228883503", ru = "tel:+78122401750", ua = "tel:+380442907730";

        $('.phones img').click(function(e) {
            // положение элемента
            var pos = $(this).offset();
            var elem_left = pos.left;
            var elem_top = pos.top;
            // положение курсора внутри элемента
            var X = e.pageX - elem_left;
            var Y = e.pageY - elem_top;
//            console.log("X: " + X + " Y: " + Y);
            var width = $(window).width();

            function bigImg(){
                if (Y >= 50 && Y <= 75) {
                    window.location.href = es;
                }
                if (Y >= 85 && Y <= 110) {
                    window.location.href = uk;
                }
                if (Y >= 115 && Y <= 140) {
                    window.location.href = usa;
                }
                if (Y >= 150 && Y <= 175) {
                    window.location.href = de;
                }
                if (Y >= 180 && Y <= 205) {
                    window.location.href = fr;
                }
                if (Y >= 210 && Y <= 235) {
                    window.location.href = it;
                }
                if (Y >= 245 && Y <= 270) {
                    window.location.href = cz;
                }
                if (Y >= 275 && Y <= 300) {
                    window.location.href = ru;
                }
                if (Y >= 305 && Y <= 335) {
                    window.location.href = ua;
                }
            }

            function smallImg(){
                if (Y >= 45 && Y <= 70) {
                    window.location.href = es;
                }
                if (Y >= 75 && Y <= 95) {
                    window.location.href = uk;
                }
                if (Y >= 100 && Y <= 120) {
                    window.location.href = usa;
                }
                if (Y >= 125 && Y <= 150) {
                    window.location.href = de;
                }
                if (Y >= 155 && Y <= 180) {
                    window.location.href = fr;
                }
                if (Y >= 185 && Y <= 210) {
                    window.location.href = it;
                }
                if (Y >= 215 && Y <= 240) {
                    window.location.href = cz;
                }
                if (Y >= 245 && Y <= 270) {
                    window.location.href = ru;
                }
                if (Y >= 275 && Y <= 300) {
                    window.location.href = ua;
                }
            }

            function xsmallImg(){
                if (Y >= 30 && Y <= 55) {
                    window.location.href = es;
                }
                if (Y >= 55 && Y <= 80) {
                    window.location.href = uk;
                }
                if (Y >= 80 && Y <= 100) {
                    window.location.href = usa;
                }
                if (Y >= 100 && Y <= 125) {
                    window.location.href = de;
                }
                if (Y >= 125 && Y <= 145) {
                    window.location.href = fr;
                }
                if (Y >= 145 && Y <= 165) {
                    window.location.href = it;
                }
                if (Y >= 165 && Y <= 185) {
                    window.location.href = cz;
                }
                if (Y >= 185 && Y <= 210) {
                    window.location.href = ru;
                }
                if (Y >= 210 && Y <= 240) {
                    window.location.href = ua;
                }
            }

            if(width > 976){
                bigImg();
            } else if (width > 752) {
                smallImg();
            } else if (width > 409){
                bigImg();
            } else if (width > 359){
                smallImg();
            } else {
                xsmallImg();
            }
        });
    </script>
@endsection
